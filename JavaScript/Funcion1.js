$(function() {
    $(document).on('click','.mostrar', function(){ 
        modificarPaquete($(this).prop('id'));
    });
});
$(function () {
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        calcular();
        calcular2();
    });
});

function limpiarBusquedas(){
    document.getElementById("txtCodigo").value="";
    document.getElementById("txtNombre").value="";
    document.getElementById("txtCodigoModificar").value="";
    document.getElementById("txtNombreModificar").value="";
}



function eliminarTrs(){
    $("#tablaVentas").find("tr:gt(0)").remove();
    $("#tablaVentasModificar").find("tr:gt(0)").remove();
    calcular();
    calcular2();
}

function pulsar(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscar();   
    }
}
function pulsarNombre(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscarNombre();   
    }
}




function buscar(){   
    var filas = $('#tBody').find('tr');
    var texto = document.getElementById("txtCodigo").value;
    var existe = false;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        if(String(codigo.toLowerCase()) == String(texto.toLowerCase())){
            var cantidad = document.getElementById(codigo).value;
            document.getElementById(codigo).value = parseInt(cantidad) + 1;
            existe = true;
            document.getElementById("txtCodigo").value= '';
            document.getElementById("txtCodigo").focus();
            calcular();
        }
    }
    if(existe == false){

        var parametros = {
            "txtCodigo" : texto
        };
        $.ajax({
            data: parametros,
            url: "AJAX/BuscarProductosCodigo.php",
            type: "POST",
            success: function(response){
                $("#tBody").append(response);
                document.getElementById("txtCodigo").value= '';
                document.getElementById("txtCodigo").focus();
                calcular();
            }
        });
    }
}
function buscarNombre(){   
    var filas = $('#tBody').find('tr');
    var texto = document.getElementById("txtNombre").value;
    var existe = false;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo = $(celdas[0]).text();
        nombre = $(celdas[1]).text();
        if(String(nombre.toLowerCase()) == String(texto.toLowerCase())){
            var cantidad = document.getElementById(codigo).value;
            document.getElementById(codigo).value = parseInt(cantidad) + 1;
            existe = true;
            document.getElementById("txtNombre").value = '';
            document.getElementById("txtNombre").focus();
            calcular();
        }
    }
    if(existe == false){

        var parametros = {
            "txtNombre" : texto
        };
        $.ajax({
            data: parametros,
            url: "AJAX/BuscarProductosNombre.php",
            type: "POST",
            success: function(response){
                $("#tBody").append(response);
                document.getElementById("txtNombre").value = '';
                document.getElementById("txtNombre").focus();
                calcular();
            }
        });
    }
}    

function calcular(){
    var filas = $("#tBody").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste
    var resultado="";
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        precio= $(celdas[2]).text().replace('.','').replace('$', '');
        cantidad = $($(celdas[3]).children("input")[0]).val();
        
        resultado -= precio * cantidad;
    }

    var total = resultado * -1;
    $("#precioTotal").html(total.toLocaleString());

}
function calcular2(){
    var filas = $("#tBodyModificar").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste
    var resultado="";
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        precio= $(celdas[2]).text().replace('.','').replace('$', '');
        cantidad = $($(celdas[3]).children("input")[0]).val();
        
        resultado -= precio * cantidad;
    }

    var total = resultado * -1;
    $("#precioTotalModificar").html(total.toLocaleString());

}
function reabrirModal(){
    $("#modalAgregarPaquete").modal();
}

function crearPaquete(){
    var nombre = document.getElementById("txtNombrePaquete").value.replace(/["']/g, "");
    var precio = document.getElementById("txtPrecioPaquete").value;
    var tipoPaquete = document.getElementById("cbPaquete").value;
    var favorito = document.getElementById("favorito").checked;
    var color;
    var filas = $('#tBody').find('tr');


    if(precio == ''){precio = document.getElementById("precioTotal").innerHTML.replace('.', '')}

    if(nombre == '' || tipoPaquete == '' || precio == 0 || filas.length == 0)
    {
        $("#modalPaqueteError").modal();
        //$("#modalAgregarPaquete").modal("hide");
    }else{
        if(tipoPaquete == 'Cirugia'){
            tipoPaquete = true;
            color = 'blue';
        }else{
            tipoPaquete = false;
            color = 'green';
        }      
        
        if(!comprobarPaqueteExistente(nombre)){
            var parametros = {
                "nombre" : nombre,
                "precio" : precio,
                "tipoPaquete" : tipoPaquete,
                "favorito" : favorito,
                "color": color
            };
            $.ajax({
                async : false,
                data: parametros,
                url: "AJAX/AgregarPaquete.php",
                type: "POST",
                success: function(response){
                    //alert(response);
                    mandarProductosPaquete(getCodigoPaquete(nombre));
                }
            });
        }else{
            $("#modalPaqueteExiste").modal();
        }
    }

}

function getCodigoPaquete(nombre){
    var codigo;
    var parametros = {
        "nombre" : nombre
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/ObtenerCodigoPaquete.php",
        type: "POST",
        success: function(response){
            if(response != ''){codigo = response}else{codigo = null}
        }
    });
    return codigo;
}

function borrarContenidoModal(){
    document.getElementById("formPaqP").reset();
    document.getElementById("formPaqN").reset();
    document.getElementById("formCb").reset();
    document.getElementById("formNom").reset();
    document.getElementById("formCod").reset();
    eliminarTrs();
}

function mandarProductosPaquete(idPaquete){
    var filas = $('#tBody').find('tr');
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        agregarProductosPaquete(codigo, cantidad, idPaquete);
    }
    $("#modalAgregarPaquete").modal("hide");
    borrarContenidoModal();
    $("#modalAgregadoExito").modal();
}

function agregarProductosPaquete(codigo, cantidad, idPaquete){
    var parametros = {
        "codigo" : codigo,
        "idPaquete" : idPaquete,
        "cantidad" : cantidad
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/AgregarProductoPaquete.php",
        type: "POST",
        success: function(response){
            
        }
    });
}

function mostrarPacks(tipo){
    mostrarPacksFavorito(tipo);
    mostrarPacksNoFavorito(tipo);
}

function mostrarPacksFavorito(tipo){
    if(tipo == 'Articulo'){tipo = false}else{tipo= true}
    var parametros = {
        "tipo" : tipo
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/CargarPaquetes.php",
        type: "POST",
        success: function(response){
            $("#favoritos").html(response);
        }
    });
}
function mostrarPacksNoFavorito(tipo){
    if(tipo == 'Articulo'){tipo = false}else{tipo= true}
    var parametros = {
        "tipo" : tipo
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/CargarPaquetesLista.php",
        type: "POST",
        success: function(response){
            $("#BLista").html(response);
        }
    });
}

function comprobarPaqueteExistente(nombre){
    var existe;
    var parametros = {
        "nombre" : nombre
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/ComprobarPaqueteExiste.php",
        type: "POST",
        success: function(response){
            if(response == '1'){existe = true}else{existe = false}
        }
    });
    return existe;
}


function array(){
    $("#tablaError").find("tr:gt(0)").remove();
    var filas = $('#tBody').find('tr');
    var great = true;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        //alert(codigo + " " + cantidad);
        var stock = Comprobar(cantidad, codigo);
        //alert("resta: " + resta);
        if(stock == null){
            great = false;
            casoError(cantidad, codigo);
        }
        //alert("great: " + great);        
    }
    if(great == false){
        $("#modalError").modal();
    }
    else{array2();}
}

function array2(){
    var filas = $('#tBody').find('tr');
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        var stock = Comprobar(cantidad, codigo);
        //alert(stock - cantidad)
        Descontar(stock, codigo);
    }
    $("#modalExito").modal();
}

function Comprobar(cantidad, codigo){
    var bienMal;
    var parametros = {
        "codigo" : codigo
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ConsultarProducto.php",
        type: "POST",
        success: function(response){
            if(response >= cantidad){
                var resta = response - cantidad;
                if(resta >= 0){
                    bienMal = response - cantidad;
                }
                else{
                    bienMal = null
                }
            }
            else{
                bienMal = null;
            }
        }
    });
    if(cantidad <= 0){
        bienMal = null;
    }
    return bienMal;
    
}
function casoError(cantidad, codigo){
    var parametros = {
        "codigo" : codigo,
        "cantidad": cantidad
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/AgregarTablaError.php",
        type: "POST",
        success: function(response){
            $("#tBodyError").append(response);
        }
    });
    
}
function Descontar(cantidad, codigo){
    var parametros = {
        "codigo" : codigo,
        "cantidad": cantidad
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/DescontarProducto.php",
        type: "POST",
        success: function(response){
        }
    });
}


//======================P A Q U E T E S==========================\\

function modificarPaquete(id){
    $("#modalModificarPaquete").modal();
    document.getElementById("txtCodigoPaqueteModificar").value = id;
    
    recuperarDatosPaquete(id);
    recuperarProductosPaquete(id);
    calcular2();


}

function modificarPaqueteFinal(){
    crearPaquete2();
}

function recuperarDatosPaquete(id){
    var parametros = {
        "id" : id
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/RecuperarDatosPaquete.php",
        type: "POST",
        success: function(response){
            var resultado = response;
            resultado = resultado.split("@?");
            document.getElementById("txtNombrePaqueteModificar").value = resultado[0];
            document.getElementById("txtPrecioPaqueteModificar").value = resultado[1];

            if(resultado[2]==0){
                document.getElementById("favoritoModificar").checked = false;
            }else{
                document.getElementById("favoritoModificar").checked = true;
            }

            var tipo;
            if(resultado[3] == 0){tipo = 'Articulos'}else{tipo = 'Cirugia'}

            var select=document.getElementById("cbPaqueteModificar");
            var buscar = tipo;
            for(var i=1;i<select.length;i++)
            {
                if(select.options[i].value==buscar)
                {
                    select.selectedIndex=i;
                }
            }
        }
    });
}

function recuperarProductosPaquete(id){
    var parametros = {
        "id" : id
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/RecuperarProductosPaquete.php",
        type: "POST",
        success: function(response){
            $("#tablaVentasModificar").find("tr:gt(0)").remove();
            $("#tBodyModificar").append(response);
        }
    });
}

function buscar2(){
    var filas = $('#tBodyModificar').find('tr');
    var texto = document.getElementById("txtCodigoModificar").value;
    var existe = false;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        if(String(codigo.toLowerCase()) == String(texto.toLowerCase())){
            var cantidad = document.getElementById(codigo).value;
            document.getElementById(codigo).value = parseInt(cantidad) + 1;
            existe = true;
            limpiarBusquedas();
            document.getElementById("txtCodigoModificar").focus();
            calcular2();
        }
    }
    if(existe == false){

        var parametros = {
            "txtCodigo" : texto
        };
        $.ajax({
            data: parametros,
            url: "AJAX/BuscarProductosCodigo.php",
            type: "POST",
            success: function(response){
                $("#tBodyModificar").append(response);
                limpiarBusquedas();
                document.getElementById("txtCodigoModificar").focus();
                calcular2();
            }
        });
    }
}
function buscarNombre2(){   
    var filas = $('#tBodyModificar').find('tr');
    var texto = document.getElementById("txtNombreModificar").value;
    var existe = false;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo = $(celdas[0]).text();
        nombre = $(celdas[1]).text();
        if(String(nombre.toLowerCase()) == String(texto.toLowerCase())){
            var cantidad = document.getElementById(codigo).value;
            document.getElementById(codigo).value = parseInt(cantidad) + 1;
            existe = true;
            limpiarBusquedas();
            document.getElementById("txtNombreModificar").focus();
            calcular2();
        }
    }
    if(existe == false){

        var parametros = {
            "txtNombre" : texto
        };
        $.ajax({
            data: parametros,
            url: "AJAX/BuscarProductosNombre.php",
            type: "POST",
            success: function(response){
                $("#tBodyModificar").append(response);
                limpiarBusquedas();
                document.getElementById("txtNombreModificar").focus();
                calcular();
            }
        });
    }
}    
function pulsar2(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscar2();   
    }
}
function pulsarNombre2(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscarNombre2();   
        buscar2();
    }
}

function eliminarProductosPaquete(id){
    var parametros = {
        "id" : id
    };
    $.ajax({
        data: parametros,
        url: "AJAX/EliminarProductosPaquete.php",
        type: "POST",
        success: function(response){
            
        }
    });
}
function eliminarPaquete(id){
    var parametros = {
        "id" : id
    };
    $.ajax({
        data: parametros,
        url: "AJAX/EliminarPaquete.php",
        type: "POST",
        success: function(response){
            
        }
    });
}

function mandarProductosPaquete2(idPaquete){
    var filas = $('#tBodyModificar').find('tr');
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        agregarProductosPaquete(codigo, cantidad, idPaquete);
    }
    $("#modalModificarPaquete").modal("hide");
    $("#modalPaqueteModificacion").modal();
}

function crearPaquete2(){
    var nombre = document.getElementById("txtNombrePaqueteModificar").value.replace(/["']/g, "");
    var precio = document.getElementById("txtPrecioPaqueteModificar").value;
    var tipoPaquete = document.getElementById("cbPaqueteModificar").value;
    var favorito = document.getElementById("favoritoModificar").checked;
    var color;
    var filas = $('#tBodyModificar').find('tr');
    
    
    if(precio == ''){precio = document.getElementById("precioTotalModificar").innerHTML.replace('.', '')}
    
    if(nombre == '' || tipoPaquete == '' || precio == 0 || filas.length == 0)
    {
        $("#modalPaqueteError").modal();
        //$("#modalAgregarPaquete").modal("hide");
    }else{
        if(tipoPaquete == 'Cirugia'){
            tipoPaquete = true;
            color = 'blue';
        }else{
            tipoPaquete = false;
            color = 'green';
        }      
        
        if(!comprobarPaqueteExistente(nombre)){
            eliminarProductosPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
            eliminarPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
            var parametros = {
                "nombre" : nombre,
                "precio" : precio,
                "tipoPaquete" : tipoPaquete,
                "favorito" : favorito,
                "color": color
            };
            $.ajax({
                async : false,
                data: parametros,
                url: "AJAX/AgregarPaquete.php",
                type: "POST",
                success: function(response){
                    //alert(response);
                    mandarProductosPaquete2(getCodigoPaquete(nombre));
                }
            });
        }else{
            $("#modalPaqueteExiste").modal();
        }
    }

}

function preparacionEliminar(){
    $("#modalPaquetePreparacionEliminacion").modal();
}
function eliminacionPaquete(){
    eliminarProductosPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
    eliminarPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
    $("#modalPaquetePreparacionEliminacion").modal("hide");
    $("#modalPaqueteEliminado").modal();
}
function esconderModal(){
    $("#modalModificarPaquete").modal("hide");
}

function array2M(){
    var filas = $('#tBodyModificar').find('tr');
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        var stock = Comprobar(cantidad, codigo);
        //alert(stock - cantidad)
        Descontar(stock, codigo);
    }
    $("#modalModificarPaquete").modal("hide");
    $("#modalExito").modal();
}
function arrayM(){
    $("#tablaErrorP").find("tr:gt(0)").remove();
    var filas = $('#tBodyModificar').find('tr');
    var great = true;
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        //alert(codigo + " " + cantidad);
        var stock = Comprobar(cantidad, codigo);
        //alert("resta: " + resta);
        if(stock == null){
            great = false;
            casoError2(cantidad, codigo);
        }
        //alert("great: " + great);        
    }
    if(great == false){
        $("#modalErrorP").modal();
    }
    else{array2M();}
}
function casoError2(cantidad, codigo){
    var parametros = {
        "codigo" : codigo,
        "cantidad": cantidad
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/AgregarTablaError.php",
        type: "POST",
        success: function(response){
            $("#tBodyErrorP").append(response);
        }
    });
    
}

//===========================M O D A L S====================================================

function nuevoPaquete(){
    borrarContenidoModal();
    $("#modalAgregarPaquete").modal();
    calcular();
}

function mostrarModal(codigo, categoria, proveedor, nombre, bodega){
    $("#modalEliminar").modal();
    document.getElementById("txtCodigoModalE").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModalE"), categoria);
    buscarSelect(document.getElementById("cbProveedorModalE"), proveedor);
    document.getElementById("txtNombreModalE").value=nombre;
    buscarSelect(document.getElementById("cbBodegaModalE"), bodega);
}
function mostrarModalModificar(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega, isChecked){
    $("#modalModificar").modal();
    document.getElementById("txtCodigoModal").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModal"), categoria);
    buscarSelect(document.getElementById("cbProveedorModal"), proveedor);
    document.getElementById("txtNombreModal").value=nombre;
    document.getElementById("nudPrecioVentaModal").value=precioVenta;
    document.getElementById("nudPrecioNetoModal").value=precioNeto;
    document.getElementById("dtpFechaVencModal").value=fechaVenc;
    document.getElementById("dtpFechaAdqModal").value=fechaAdq;
    document.getElementById("nudStockMinModal").value=stockMin;
    document.getElementById("nudStockActModal").value=stockAct;
    buscarSelect(document.getElementById("cbBodegaModal"), bodega);
    estaChecked2(isChecked);
}
function mostrarModalModificar2(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega, isChecked){
    $("#modalModificar2").modal();
    
   
    document.getElementById("txtCodigoModal2").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModal2"), categoria);
    buscarSelect(document.getElementById("cbProveedorModal2"), proveedor);
    document.getElementById("txtNombreModal2").value=nombre;
    document.getElementById("nudPrecioVentaModal2").value=precioVenta;
    document.getElementById("nudPrecioNetoModal2").value=precioNeto;
    document.getElementById("dtpFechaVencModal2").value=fechaVenc;
    document.getElementById("dtpFechaAdqModal2").value=fechaAdq;
    document.getElementById("nudStockMinModal2").value=stockMin;
    document.getElementById("nudStockActModal2").value=stockAct;
    buscarSelect(document.getElementById("cbBodegaModal2"), bodega);
    estaChecked(isChecked);
}

function estaChecked(condicion){
    if(condicion == '1'){
        document.getElementById('modFecha').checked = true;
    }else{
            document.getElementById('modFecha').checked = false;    
    }
}
function estaChecked2(condicion){
    if(condicion == '1'){
        document.getElementById('modFechaConsultas').checked = true;
    }else{
            document.getElementById('modFechaConsultas').checked = false;    
    }
}

function agregar(){
    var texto1 = document.getElementById("txtCodigoModalAgregar").value;
    var texto2 = document.getElementById("cbCategoriaModalAgregar").value;
    var texto3 = document.getElementById("cbProveedorModalAgregar").value;
    var texto4 = document.getElementById("txtNombreModalAgregar").value;
    var texto5 = document.getElementById("nudPrecioVentaModalAgregar").value;
    var texto6 = document.getElementById("nudPrecioNetoModalAgregar").value;
    var texto7 = document.getElementById("dtpFechaVencModalAgregar").value;
    var texto8 = document.getElementById("dtpFechaAdqModalAgregar").value;
    var texto9 = document.getElementById("nudStockMinModalAgregar").value;
    var texto10 = document.getElementById("nudStockActModalAgregar").value;
    var texto11 = document.getElementById("cbBodegaModalAgregar").value;
    var if1 = false;

    if(document.getElementById("modFechaAgregar").checked == true){
        texto7 = 'null';
    }
    if(texto7 =='' && document.getElementById("modFechaAgregar").checked==false)
    {
        $("#modalErrorFV").modal();
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || (texto7 != '' && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalErrorAgregar").modal();
        if1 = true;
    }
    if(texto7 == ''){texto7 = 'null'}

    else
    {
        if(comprobarCodigo(texto1) != false){
            if(!if1){
                var parametros = {
                    "txtCodigoModalAgregar" : texto1,
                    "cbCategoriaModalAgregar" : texto2,
                    "cbProveedorModalAgregar" : texto3,
                    "txtNombreModalAgregar" : texto4,
                    "nudPrecioVentaModalAgregar" : texto5,
                    "nudPrecioNetoModalAgregar" : texto6,
                    "dtpFechaVencModalAgregar" : texto7,
                    "dtpFechaAdqModalAgregar" : texto8,
                    "nudStockMinModalAgregar" : texto9,
                    "nudStockActModalAgregar" : texto10,
                    "cbBodegaModalAgregar" : texto11
                };
                $.ajax({
                    async: false,
                    data: parametros,
                    url: "AJAX/AgregarProducto.php",
                    type: "POST",
                    success: function(response){
                        $("#modalAgregar").modal("hide");
                        $("#modalExito").modal();
                        //document.getElementById("cerrarBien").focus();
                        limpiarAgregar();
                        //var div =   $("#card1").html();
                        //document.getElementById("card1").load(div);
                    },
                    error: function(){
                        alert("error");
                    }
                });
            }
        }
        else{
            $("#modalErrorAgregarCodigo").modal();
        }
        
    }
}

function limpiarAgregar(){
    document.getElementById("txtCodigoModalAgregar").value = '';
    document.getElementById("cbCategoriaModalAgregar").value = '';
    document.getElementById("cbProveedorModalAgregar").value = '';
    document.getElementById("txtNombreModalAgregar").value = '';
    document.getElementById("nudPrecioVentaModalAgregar").value = '';
    document.getElementById("nudPrecioNetoModalAgregar").value = '';
    document.getElementById("dtpFechaVencModalAgregar").value = '';
    document.getElementById("dtpFechaAdqModalAgregar").value = '';
    document.getElementById("nudStockMinModalAgregar").value = '';
    document.getElementById("nudStockActModalAgregar").value = '';
    document.getElementById("cbBodegaModalAgregar").value = '';
}

function comprobarCodigo(codigo){
    var estaBien;
    var parametros = {
        "txtCodigoComprobar" : codigo,
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ComprobarCodigo.php",
        type: "POST",
        success: function(response){
            if(response == 1){
                estaBien = false;
            }
            else{estaBien=true;}
        }
    });
    return estaBien;
}

function modalNuevo(){
    $("#modalAgregar").modal();
}

function buscarSelect(select, buscar)
{ 
	for(var i=1;i<select.length;i++)
	{
		if(select.options[i].text==buscar)
		{
			// seleccionamos el valor que coincide
			select.selectedIndex=i;
		}
	}
}


function modificar(){
    var texto1 = document.getElementById("txtCodigoModal").value;
    var texto2 = document.getElementById("cbCategoriaModal").value;
    var texto3 = document.getElementById("cbProveedorModal").value;
    var texto4 = document.getElementById("txtNombreModal").value;
    var texto5 = document.getElementById("nudPrecioVentaModal").value;
    var texto6 = document.getElementById("nudPrecioNetoModal").value;
    var texto7 = document.getElementById("dtpFechaVencModal").value;
    var texto8 = document.getElementById("dtpFechaAdqModal").value;
    var texto9 = document.getElementById("nudStockMinModal").value;
    var texto10 = document.getElementById("nudStockActModal").value;
    var texto11 = document.getElementById("cbBodegaModal").value;

    if(document.getElementById("modFechaConsultas").checked == true){
        texto7 = 'null';
    }
    if(texto7 =='' && document.getElementById("modFechaConsultas").checked==false)
    {
        $("#modalErrorFV").modal();
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto5 < 0 || texto6 < 0 || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || ((texto7 != '' || texto7 != 'null') && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalError").modal('show');
        document.getElementById("cerrarError").focus();
        $("#modalModificar").modal().focus();
    }
    else
    {

        var parametros = {
            "txtCodigoModal" : texto1,
            "cbCategoriaModal" : texto2,
            "cbProveedorModal" : texto3,
            "txtNombreModal" : texto4,
            "nudPrecioVentaModal" : texto5,
            "nudPrecioNetoModal" : texto6,
            "dtpFechaVencModal" : texto7,
            "dtpFechaAdqModal" : texto8,
            "nudStockMinModal" : texto9,
            "nudStockActModal" : texto10,
            "cbBodegaModal" : texto11
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificaProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalModificar").modal("hide");
                updateDiv2();
                $("#modalBien").modal();
                //document.getElementById("cerrarBien").focus();
                //limpiarTodo();
            }
        });
    }
}
function ponerReadOnly(id)
{
    // Ponemos el atributo de solo lectura
    $("#"+id).attr("readonly","readonly");
    // Ponemos una clase para cambiar el color del texto y mostrar que
    // esta deshabilitado
    $("#"+id).addClass("readOnly");
}
 
function quitarReadOnly(id)
{
    // Eliminamos el atributo de solo lectura
    $("#"+id).removeAttr("readonly");
    // Eliminamos la clase que hace que cambie el color
    $("#"+id).removeClass("readOnly");
}
function cambiarChecked(id){
    if(document.getElementById(id).checked == true){
        if(id == 'modFecha'){
            ponerReadOnly('dtpFechaVencModal2');
        }
    }else{
        if(id == 'modFecha'){
            quitarReadOnly('dtpFechaVencModal2');
        }
    }
}

function modificar2(){
    var texto1 = document.getElementById("txtCodigoModal2").value;
    var texto2 = document.getElementById("cbCategoriaModal2").value;
    var texto3 = document.getElementById("cbProveedorModal2").value;
    var texto4 = document.getElementById("txtNombreModal2").value;
    var texto5 = document.getElementById("nudPrecioVentaModal2").value;
    var texto6 = document.getElementById("nudPrecioNetoModal2").value;
    var texto7 = document.getElementById("dtpFechaVencModal2").value;
    var texto8 = document.getElementById("dtpFechaAdqModal2").value;
    var texto9 = document.getElementById("nudStockMinModal2").value;
    var texto10 = document.getElementById("nudStockActModal2").value;
    var texto11 = document.getElementById("cbBodegaModal2").value;
    
    if(document.getElementById("modFecha").checked == true){
        texto7 = 'null';
    }
    if(document.getElementById("modFecha").checked == false && texto7 == '')
    {
        $("#modalErrorFV").modal();
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto5 < 0 || texto6 < 0 || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || ((texto7 != '' || texto7 != 'null') && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalError").modal();
        document.getElementById("cerrarError").focus();
    }
    else{
        var parametros = {
            "txtCodigoModal" : texto1,
            "cbCategoriaModal" : texto2,
            "cbProveedorModal" : texto3,
            "txtNombreModal" : texto4,
            "nudPrecioVentaModal" : texto5,
            "nudPrecioNetoModal" : texto6,
            "dtpFechaVencModal" : texto7,
            "dtpFechaAdqModal" : texto8,
            "nudStockMinModal" : texto9,
            "nudStockActModal" : texto10,
            "cbBodegaModal" : texto11
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificaProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalModificar2").modal("hide");
                $("#modalExito").modal();
                //document.getElementById("cerrarBien").focus();
            },
            error: function(response){
                alert("Error");
            }
        });
    }
}

function eliminar(){
    var texto1 = document.getElementById("txtCodigoModalE").value;

    if(texto1 == '')
    {
        $("#modalError").modal();
        document.getElementById("cerrarError").focus();
    }
    else{

        var parametros = {
            "txtCodigoModalE" : texto1
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/EliminarProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalEliminar").modal('hide');
                $("#modalExito").modal();
                //document.getElementById("cerrarBienE").focus();
                //limpiarTodo();
            }
        });
    }
}


//===========================E N V I A R====================================================
function enviarFechaEsp(){
    var texto = document.getElementById("fechaEsp").value;

    var parametros = {
        "fechaEsp" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaFechaAdqEsp.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function enviarFechaRango(){
    var texto = document.getElementById("fechaRDesde").value;
    var texto2 = document.getElementById("fechaRHasta").value;

    if( (new Date(texto).getTime() > new Date(texto2).getTime()))
    {
        $("#myModal2").modal();
    }
    else{

        var parametros = {
            "fechaRDesde" : texto,
            "fechaRHasta" : texto2
        };
        $.ajax({
            async:false,
            data: parametros,
            url: "AJAX/ValidaFechaAdqRango.php",
            type: "POST",
            success: function(response){
                $("#datosConsulta").html(response);
            }
        });
    }
}
function enviarFechaVEsp(){
    var texto = document.getElementById("fechaVEsp").value;
    
    var parametros = {
        "fechaVEsp" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaFechaVencEsp.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function enviarFechaVRango(){
    var texto = document.getElementById("fechaVRDesde").value;
    var texto2 = document.getElementById("fechaVRHasta").value;

    if( (new Date(texto).getTime() > new Date(texto2).getTime()))
    {
        $("#myModal").modal();
    }
    else{

        var parametros = {
            "fechaVRDesde" : texto,
            "fechaVRHasta" : texto2
        };
        $.ajax({
            async:false,
            data: parametros,
            url: "AJAX/ValidaFechaVencRango.php",
            type: "POST",
            success: function(response){
                $("#datosConsulta").html(response);
            }
        });
    }
}
function busqueda(){
    var texto = document.getElementById("codigo").value;
    
    var parametros = {
        "texto" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaCodigo.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
            pulsar2(event);
        }
    });
}
function busquedaNombre(){
    var texto = document.getElementById("nombre1").value;

    var parametros = {
        "nombre1" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaNombre.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function pulsar2(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        busqueda();   
    }
}



function enviarOtro(){
    var texto = document.getElementById("otroSelect").value;
    
    var parametros = {
        "otroSelect" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaOtro.php",
        type: "POST",
        success: function(response){
            $("#otro2Select").html(response);
        }
    });
}

function enviarOtro2(){
    var texto = document.getElementById("otroSelect").value;
    var texto2 = document.getElementById("otro2Select").value;
    
    var parametros = {
        "otroSelect" : texto,
        "otro2Select" : texto2
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaOtro2.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}

//===========================L I M P I A R====================================================
function removeOptions(selectbox)
{
    var i;
    for(i = document.getElementById("otro2Select").options.length - 1 ; i >= 0 ; i--)
    {
        document.getElementById("otro2Select").remove(i);
    }
}
function limpiarFormularioFecha1() {
    document.getElementById("fechaEsp").value = "";
    document.getElementById("fechaRDesde").value = "";
    document.getElementById("fechaRHasta").value = "";
    //document.getElementById("fechaEsp").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}
function limpiarFormularioFecha2() {
    document.getElementById("fechaVEsp").value = "";
    document.getElementById("fechaVRDesde").value = "";
    document.getElementById("fechaVRHasta").value = "";
    //document.getElementById("fechaEsp").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}

function limpiarFormulario() {
    document.getElementById("codigo").value = "";
    //busqueda();
    document.getElementById("codigo").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo();
}
function limpiarFormularioCodigoConsultas() {
    document.getElementById("txtCodigoConsulta").value = "";
    //busqueda();
    document.getElementById("txtCodigoConsulta").focus();
}
function limpiarFormulario2() {
    $('#otroSelect option').prop('selected', function() {
        return this.defaultSelected;
    });
    var i;
    for(i = document.getElementById("otro2Select").options.length - 1 ; i >= 0 ; i--)
    {
        document.getElementById("otro2Select").remove(i);
    }
    document.getElementById("datosConsulta").innerHTML='';
   
}
function limpiarFormularioNombre() {
    document.getElementById("nombre1").value = "";
    busquedaNombre();
    document.getElementById("nombre1").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}
function limpiarTodo(){
    document.getElementById("codigo").value="";
    document.getElementById("nombre1").value = "";
    document.getElementById("fechaVEsp").value="";
    document.getElementById("fechaVRDesde").value="";
    document.getElementById("fechaVRHasta").value="";
    document.getElementById("fechaEsp").value="";
    document.getElementById("fechaRDesde").value="";
    document.getElementById("fechaRHasta").value="";
    document.getElementById("datosConsulta").innerHTML='';
    // document.getElementById("datosNombre").innerHTML='';
    // document.getElementById("datos2").innerHTML='';
    // document.getElementById("datos1").innerHTML='';
    // document.getElementById("datostodo").innerHTML='';
    // document.getElementById("datosOtro").innerHTML='';
    document.getElementById("borrarOtro").onclick();
    
    
}

//===========================M O D A L S====================================================

function nuevoPaquete(){
    borrarContenidoModal();
    $("#modalAgregarPaquete").modal();
    calcular();
}

function mostrarModal(codigo, categoria, proveedor, nombre, bodega){
    $("#modalEliminar").modal();
    document.getElementById("txtCodigoModalE").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModalE"), categoria);
    buscarSelect(document.getElementById("cbProveedorModalE"), proveedor);
    document.getElementById("txtNombreModalE").value=nombre;
    buscarSelect(document.getElementById("cbBodegaModalE"), bodega);
}
function mostrarModalModificar(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega, isChecked){
    $("#modalModificar").modal();
    document.getElementById("txtCodigoModal").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModal"), categoria);
    buscarSelect(document.getElementById("cbProveedorModal"), proveedor);
    document.getElementById("txtNombreModal").value=nombre;
    document.getElementById("nudPrecioVentaModal").value=precioVenta;
    document.getElementById("nudPrecioNetoModal").value=precioNeto;
    document.getElementById("dtpFechaVencModal").value=fechaVenc;
    document.getElementById("dtpFechaAdqModal").value=fechaAdq;
    document.getElementById("nudStockMinModal").value=stockMin;
    document.getElementById("nudStockActModal").value=stockAct;
    buscarSelect(document.getElementById("cbBodegaModal"), bodega);
    estaChecked2(isChecked);
}
function mostrarModalModificar2(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega, isChecked){
    $("#modalModificar2").modal();
    
   
    document.getElementById("txtCodigoModal2").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModal2"), categoria);
    buscarSelect(document.getElementById("cbProveedorModal2"), proveedor);
    document.getElementById("txtNombreModal2").value=nombre;
    document.getElementById("nudPrecioVentaModal2").value=precioVenta;
    document.getElementById("nudPrecioNetoModal2").value=precioNeto;
    document.getElementById("dtpFechaVencModal2").value=fechaVenc;
    document.getElementById("dtpFechaAdqModal2").value=fechaAdq;
    document.getElementById("nudStockMinModal2").value=stockMin;
    document.getElementById("nudStockActModal2").value=stockAct;
    buscarSelect(document.getElementById("cbBodegaModal2"), bodega);
    estaChecked(isChecked);
}

function estaChecked(condicion){
    if(condicion == '1'){
        document.getElementById('modFecha').checked = true;
    }else{
            document.getElementById('modFecha').checked = false;    
    }
}
function estaChecked2(condicion){
    if(condicion == '1'){
        document.getElementById('modFechaConsultas').checked = true;
    }else{
            document.getElementById('modFechaConsultas').checked = false;    
    }
}


function limpiarAgregar(){
    document.getElementById("txtCodigoModalAgregar").value = '';
    document.getElementById("cbCategoriaModalAgregar").value = '';
    document.getElementById("cbProveedorModalAgregar").value = '';
    document.getElementById("txtNombreModalAgregar").value = '';
    document.getElementById("nudPrecioVentaModalAgregar").value = '';
    document.getElementById("nudPrecioNetoModalAgregar").value = '';
    document.getElementById("dtpFechaVencModalAgregar").value = '';
    document.getElementById("dtpFechaAdqModalAgregar").value = '';
    document.getElementById("nudStockMinModalAgregar").value = '';
    document.getElementById("nudStockActModalAgregar").value = '';
    document.getElementById("cbBodegaModalAgregar").value = '';
}

function comprobarCodigo(codigo){
    var estaBien;
    var parametros = {
        "txtCodigoComprobar" : codigo,
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ComprobarCodigo.php",
        type: "POST",
        success: function(response){
            if(response == 1){
                estaBien = false;
            }
            else{estaBien=true;}
        }
    });
    return estaBien;
}

function modalNuevo(){
    $("#modalAgregar").modal();
}

function buscarSelect(select, buscar)
{ 
	for(var i=1;i<select.length;i++)
	{
		if(select.options[i].text==buscar)
		{
			// seleccionamos el valor que coincide
			select.selectedIndex=i;
		}
	}
}


function modificar(){
    var texto1 = document.getElementById("txtCodigoModal").value;
    var texto2 = document.getElementById("cbCategoriaModal").value;
    var texto3 = document.getElementById("cbProveedorModal").value;
    var texto4 = document.getElementById("txtNombreModal").value;
    var texto5 = document.getElementById("nudPrecioVentaModal").value;
    var texto6 = document.getElementById("nudPrecioNetoModal").value;
    var texto7 = document.getElementById("dtpFechaVencModal").value;
    var texto8 = document.getElementById("dtpFechaAdqModal").value;
    var texto9 = document.getElementById("nudStockMinModal").value;
    var texto10 = document.getElementById("nudStockActModal").value;
    var texto11 = document.getElementById("cbBodegaModal").value;

    if(document.getElementById("modFechaConsultas").checked == true){
        texto7 = 'null';
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto5 < 0 || texto6 < 0 || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || ((texto7 != '' || texto7 != 'null') && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalError").modal('show');
        document.getElementById("cerrarError").focus();
        $("#modalModificar").modal().focus();
    }
    else
    {

        var parametros = {
            "txtCodigoModal" : texto1,
            "cbCategoriaModal" : texto2,
            "cbProveedorModal" : texto3,
            "txtNombreModal" : texto4,
            "nudPrecioVentaModal" : texto5,
            "nudPrecioNetoModal" : texto6,
            "dtpFechaVencModal" : texto7,
            "dtpFechaAdqModal" : texto8,
            "nudStockMinModal" : texto9,
            "nudStockActModal" : texto10,
            "cbBodegaModal" : texto11
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificaProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalModificar").modal("hide");
                $("#modalExito").modal();
                //document.getElementById("cerrarBien").focus();
                //limpiarTodo();
            }
        });
    }
}
function ponerReadOnly(id)
{
    // Ponemos el atributo de solo lectura
    $("#"+id).attr("readonly","readonly");
    // Ponemos una clase para cambiar el color del texto y mostrar que
    // esta deshabilitado
    $("#"+id).addClass("readOnly");
}
 
function quitarReadOnly(id)
{
    // Eliminamos el atributo de solo lectura
    $("#"+id).removeAttr("readonly");
    // Eliminamos la clase que hace que cambie el color
    $("#"+id).removeClass("readOnly");
}
function cambiarChecked(id){
    if(document.getElementById(id).checked == true){
        if(id == 'modFecha'){
            ponerReadOnly('dtpFechaVencModal2');
        }
    }else{
        if(id == 'modFecha'){
            quitarReadOnly('dtpFechaVencModal2');
        }
    }
}

function modificar2(){
    var texto1 = document.getElementById("txtCodigoModal2").value;
    var texto2 = document.getElementById("cbCategoriaModal2").value;
    var texto3 = document.getElementById("cbProveedorModal2").value;
    var texto4 = document.getElementById("txtNombreModal2").value;
    var texto5 = document.getElementById("nudPrecioVentaModal2").value;
    var texto6 = document.getElementById("nudPrecioNetoModal2").value;
    var texto7 = document.getElementById("dtpFechaVencModal2").value;
    var texto8 = document.getElementById("dtpFechaAdqModal2").value;
    var texto9 = document.getElementById("nudStockMinModal2").value;
    var texto10 = document.getElementById("nudStockActModal2").value;
    var texto11 = document.getElementById("cbBodegaModal2").value;
    
    if(document.getElementById("modFecha").checked == true){
        texto7 = 'null';
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto5 < 0 || texto6 < 0 || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || ((texto7 != '' || texto7 != 'null') && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalError").modal();
        document.getElementById("cerrarError").focus();
    }
    else{
        var parametros = {
            "txtCodigoModal" : texto1,
            "cbCategoriaModal" : texto2,
            "cbProveedorModal" : texto3,
            "txtNombreModal" : texto4,
            "nudPrecioVentaModal" : texto5,
            "nudPrecioNetoModal" : texto6,
            "dtpFechaVencModal" : texto7,
            "dtpFechaAdqModal" : texto8,
            "nudStockMinModal" : texto9,
            "nudStockActModal" : texto10,
            "cbBodegaModal" : texto11
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificaProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalModificar2").modal("hide");
                $("#modalExito").modal();
                //document.getElementById("cerrarBien").focus();
            },
            error: function(response){
                alert("Error");
            }
        });
    }
}

function eliminar(){
    var texto1 = document.getElementById("txtCodigoModalE").value;

    if(texto1 == '')
    {
        $("#modalError").modal();
        document.getElementById("cerrarError").focus();
    }
    else{

        var parametros = {
            "txtCodigoModalE" : texto1
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/EliminarProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalEliminar").modal("hide");
                $("#modalExito").modal();
                //document.getElementById("cerrarBienE").focus();
                limpiarTodo();
            }
        });
    }
}


//===========================E N V I A R====================================================
function enviarFechaEsp(){
    var texto = document.getElementById("fechaEsp").value;

    var parametros = {
        "fechaEsp" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaFechaAdqEsp.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function enviarFechaRango(){
    var texto = document.getElementById("fechaRDesde").value;
    var texto2 = document.getElementById("fechaRHasta").value;

    if( (new Date(texto).getTime() > new Date(texto2).getTime()))
    {
        $("#myModal2").modal();
    }
    else{

        var parametros = {
            "fechaRDesde" : texto,
            "fechaRHasta" : texto2
        };
        $.ajax({
            async:false,
            data: parametros,
            url: "AJAX/ValidaFechaAdqRango.php",
            type: "POST",
            success: function(response){
                $("#datosConsulta").html(response);
            }
        });
    }
}
function enviarFechaVEsp(){
    var texto = document.getElementById("fechaVEsp").value;
    
    var parametros = {
        "fechaVEsp" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaFechaVencEsp.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function enviarFechaVRango(){
    var texto = document.getElementById("fechaVRDesde").value;
    var texto2 = document.getElementById("fechaVRHasta").value;

    if( (new Date(texto).getTime() > new Date(texto2).getTime()))
    {
        $("#myModal").modal();
    }
    else{

        var parametros = {
            "fechaVRDesde" : texto,
            "fechaVRHasta" : texto2
        };
        $.ajax({
            async:false,
            data: parametros,
            url: "AJAX/ValidaFechaVencRango.php",
            type: "POST",
            success: function(response){
                $("#datosConsulta").html(response);
            }
        });
    }
}
function busqueda(){
    var texto = document.getElementById("codigo").value;
    
    var parametros = {
        "texto" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaCodigo.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
            pulsar2(event);
        }
    });
}
function busquedaNombre(){
    var texto = document.getElementById("nombre1").value;

    var parametros = {
        "nombre1" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaNombre.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}
function pulsar2(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        busqueda();   
    }
}



function enviarOtro(){
    var texto = document.getElementById("otroSelect").value;
    
    var parametros = {
        "otroSelect" : texto
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaOtro.php",
        type: "POST",
        success: function(response){
            $("#otro2Select").html(response);
        }
    });
}

function enviarOtro2(){
    var texto = document.getElementById("otroSelect").value;
    var texto2 = document.getElementById("otro2Select").value;
    
    var parametros = {
        "otroSelect" : texto,
        "otro2Select" : texto2
    };
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ValidaOtro2.php",
        type: "POST",
        success: function(response){
            $("#datosConsulta").html(response);
        }
    });
}

//===========================L I M P I A R====================================================
function removeOptions(selectbox)
{
    var i;
    for(i = document.getElementById("otro2Select").options.length - 1 ; i >= 0 ; i--)
    {
        document.getElementById("otro2Select").remove(i);
    }
}
function limpiarFormularioFecha1() {
    document.getElementById("fechaEsp").value = "";
    document.getElementById("fechaRDesde").value = "";
    document.getElementById("fechaRHasta").value = "";
    //document.getElementById("fechaEsp").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}
function limpiarFormularioFecha2() {
    document.getElementById("fechaVEsp").value = "";
    document.getElementById("fechaVRDesde").value = "";
    document.getElementById("fechaVRHasta").value = "";
    //document.getElementById("fechaEsp").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}

function limpiarFormulario() {
    document.getElementById("codigo").value = "";
    //busqueda();
    document.getElementById("codigo").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo();
}
function limpiarFormulario2() {
    $('#otroSelect option').prop('selected', function() {
        return this.defaultSelected;
    });
    var i;
    for(i = document.getElementById("otro2Select").options.length - 1 ; i >= 0 ; i--)
    {
        document.getElementById("otro2Select").remove(i);
    }
    document.getElementById("datosConsulta").innerHTML='';
   
}
function limpiarFormularioNombre() {
    document.getElementById("nombre1").value = "";
    busquedaNombre();
    document.getElementById("nombre1").focus();
    document.getElementById("datosConsulta").innerHTML='';
    limpiarTodo()
}
function limpiarTodo(){
    document.getElementById("codigo").value="";
    document.getElementById("nombre1").value = "";
    document.getElementById("fechaVEsp").value="";
    document.getElementById("fechaVRDesde").value="";
    document.getElementById("fechaVRHasta").value="";
    document.getElementById("fechaEsp").value="";
    document.getElementById("fechaRDesde").value="";
    document.getElementById("fechaRHasta").value="";
    document.getElementById("datosConsulta").innerHTML='';
    // document.getElementById("datosNombre").innerHTML='';
    // document.getElementById("datos2").innerHTML='';
    // document.getElementById("datos1").innerHTML='';
    // document.getElementById("datostodo").innerHTML='';
    // document.getElementById("datosOtro").innerHTML='';
    document.getElementById("borrarOtro").onclick();
    
    
}

$(function(){
    $(document).on('click','.mostrar2', function(){ 
        location.href = "PorVenta.php";
    });
});
function mostrarModalModificarV(codigo, nombre, fecha, fecha2, stock){
    $("#modalModificarV").modal();

    document.getElementById("txtCodigoModificarV").value = codigo;
    document.getElementById("txtNombreModificarV").value = nombre;
    document.getElementById("dtpFechaVencModificarV").value = fecha;
    document.getElementById("dtpFechaAdqModificarV").value = fecha2;
    document.getElementById("nudStockActModificarV").value = stock;
}

function modificarXVenc(){
    var codigo = document.getElementById("txtCodigoModificarV").value;
    var fechaV = document.getElementById("dtpFechaVencModificarV").value;
    var fechaA = document.getElementById("dtpFechaAdqModificarV").value;
    var stock = document.getElementById("nudStockActModificarV").value;
    
    if(new Date(fechaA).getTime() > new Date(fechaV).getTime() || stock <= 0 || stock == '' || fechaA == '' || fechaV == ''){
        $("#modalError").modal();
    }
    else{
        var parametros = {
            "codigo" : codigo,
            "fechaV" : fechaV,
            "fechaA" : fechaA,
            "stock" : stock,
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificarVencidos.php",
            type: "POST",
            success: function(response){
                $("#modalModificarV").modal('hide');
                $('#modalExito').modal();
            }
        });
    }
}

function recargar(){
    $("#recargar").load(window.location.href + " #recargar");
}

function irProductos(){
    location.href = "../src/pages/Productos.php";
}
function irXVenc(){
    location.href = "../src/pages/PorVencer.php";
}
function irVenc(){
    location.href = "../src/pages/Vencidos.php";
}
function buscarFavNoFav(tipo, nombre){
    buscarPaqueteFav(tipo, nombre);
    buscarPaqueteNFav(tipo, nombre);
}
function buscarPaqueteFav(tipo, nombre){
    var nombre = document.getElementById(nombre).value;
    if(tipo == 'Articulo'){tipo = false}else{tipo= true}
    var parametros = {
        "tipo" : tipo,
        "nombre": nombre
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/CargarPaquetesB.php",
        type: "POST",
        success: function(response){
            $("#favoritos").html(response);
        }
    });
}
function buscarPaqueteNFav(tipo, nombre){
    var nombre = document.getElementById(nombre).value;
    if(tipo == 'Articulo'){tipo = false}else{tipo= true}
    var parametros = {
        "tipo" : tipo,
        "nombre": nombre
    };
    $.ajax({
        async : false,
        data: parametros,
        url: "AJAX/CargarPaquetesListaB.php",
        type: "POST",
        success: function(response){
            $("#BLista").html(response);
        }
    });
}

function limpiarPaquete(nombre, tipo){
    document.getElementById(nombre).value = '';
    if(tipo == "Articulo"){
        document.getElementById("btnBuscarArticulo").click();
    }
    else{
        document.getElementById("btnBuscarCirugia").click();
    }
}

//=================Configs======================//

function nuevoUsuario(){
 
    var user= document.getElementById("txtUserNombre").value.replace(/["']/g, "");
    var nombre=document.getElementById("txtUserUser").value.replace(/["']/g, "");
    var pass=document.getElementById("txtUserPass").value.replace(/["']/g, "");
    var check=document.getElementById("switch-sm").checked;
    var cargo;
    if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)
    || user == null || user.length == 0 || /^\s+$/.test(user) || pass == null || pass.length==0 ||
    /^\s+$/.test(pass)){
        $("#modalAgregarUsuario").modal("hide");
  $("#modalERROR").modal();
}
else{
    if(check)
    {
        cargo='1';
    }
    else{ cargo='0';}


    var parametros = {
        "txtUserNombre": nombre,
        "txtUserUser" : user,
        "txtUserPass": pass,
        "txtUserCargo": cargo
    }
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/CrearUser.php",
        type: "POST",
        success: function(){
            document.getElementById("txtUserNombre").value="";
            document.getElementById("txtUserUser").value="";
            document.getElementById("txtUserPass").value="";
           $("#modalAgregarUsuario").modal('hide');
           $("#modalExito").modal();
        }
    });   
}
    
    
}
function mostrarModalAgregarUsuario(){
    $("#modalAgregarUsuario").modal();
}

function updateDiv(){
    
    $("#modalExito").modal('hide');
    $( "#recargar" ).load(window.location.href + " #recargar" );
}
function updateDiv2(){
    $( "#recargar" ).load(window.location.href + " #recargar" );
}
function updateResultados(){
    $("#modalExito").modal('hide');
    $( "#resultados" ).load(window.location.href + " #resultados" );
}

function borrarElemento(){
    
    var id = document.getElementById("idE").value;
    var tabla = document.getElementById("tablaE").value;
    var campoID = document.getElementById("campoIDE").value;

    var parametros = {
        "id" : id,
        "tabla": tabla,
        "campoID": campoID
    };
    $.ajax({
        async: false,
        data: parametros,
        url: "AJAX/EliminarElemento.php",
        type: "POST",
        
        success: function(){
            $("#modalPreparacionEliminacion").modal('hide');
            $("#modalExito").modal(); 
        }
    }); 
}

function previoEliminacionElemento(id,tabla,campoID){
    document.getElementById("idE").value=id;
    document.getElementById("tablaE").value=tabla;
    document.getElementById("campoIDE").value=campoID;
    $("#modalPreparacionEliminacion").modal(); 
   
}

function mostrarModalAgregarElemento(tabla,campo){
    document.getElementById("tablaA").value=tabla;
    document.getElementById("campoA").value=campo;
    $("#modalAgregarElemento").modal();
}
function nuevoElemento(){
    var nombre= document.getElementById("txtNombreElementoA").value.replace(/["']/g, "");
    var campo= document.getElementById("campoA").value;
    var tabla= document.getElementById("tablaA").value;
    if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        $("#modalAgregarElemento").modal("hide");
  $("#modalERROR").modal();
}
else{
    var parametros = {
        "txtNombreElemento": nombre,
        "campo": campo,
        "tabla": tabla
    }
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/CrearElemento.php",
        type: "POST",
        success: function(){
            document.getElementById("txtNombreElementoA").value="";
           $("#modalAgregarElemento").modal('hide');
           $("#modalExito").modal();
        }
    });   
}
   
}

function mostrarModalModificarElemento(id,nombre,campo,campoID,tabla){
    document.getElementById("idM").value=id;
    document.getElementById("txtNombreElementoM").value=nombre;
    document.getElementById("campoM").value=campo;
    document.getElementById("tablaM").value=tabla;
    document.getElementById("campoIDM").value=campoID;
    $("#modalModificarElemento").modal();
}
function mostrarModalModificarUsuario(id,nombreUser,pass,user){
  
    document.getElementById("txtNombreUserM").value=nombreUser;
    document.getElementById("txtUsuarioUserM").value=user;
    document.getElementById("txtUserPassM").value=pass;
    document.getElementById("idUserM").value=id;
    $("#modalModificarUsuario").modal();
}
function modificarCuenta(){
    var id= document.getElementById("idUserM").value;
    var nombreUser= document.getElementById("txtNombreUserM").value.replace(/["']/g, "");
    var pass= document.getElementById("txtUserPassM").value.replace(/["']/g, "");
    var user= document.getElementById("txtUsuarioUserM").value.replace(/["']/g, "");
    var check=document.getElementById("switch-smM").checked;
    var cargo;
if(nombreUser == null || nombreUser.length == 0 || /^\s+$/.test(nombreUser) ||
user == null || user.length == 0 || /^\s+$/.test(user) ||
pass == null || pass.length == 0 || /^\s+$/.test(pass)) {
        $("#modalModificarUsuario").modal("hide");
  $("#modalERROR").modal();
}
else{
    if(check)
    {
        cargo='1';
    }
    else{ cargo='0';}
    var parametros = {
        "id": id,
        "nombre": nombreUser,
        "pass": pass,
        "user": user,
        "cargo": cargo
    }
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ModificarCuenta.php",
        type: "POST",
        success: function(){
        
            document.getElementById("txtNombreUserM").value = "";
            document.getElementById("idM").value = "";
            document.getElementById("txtUsuarioUserM").value = "";
            document.getElementById("txtUserPassM").value = "";
            document.getElementById("switch-smM").checked =false;

           $("#modalModificarUsuario").modal('hide');
           $("#modalExito").modal();
        },
        error: function(){
            alert("error");
        }
        
    });

}
    

}

function modificarElemento(){
    var id = document.getElementById("idM").value;
    var nombre = document.getElementById("txtNombreElementoM").value.replace(/["']/g, "");
    var campo = document.getElementById("campoM").value;
    var tabla = document.getElementById("tablaM").value;
    var campoID = document.getElementById("campoIDM").value;

    if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        $("#modalModificarElemento").modal("hide");
  $("#modalERROR").modal();
}
else{
    var parametros = {
        "txtNombreElemento": nombre,
        "id": id,
        "campo": campo,
        "tabla": tabla,
        "campoID":campoID
    }
    //alert(" "+nombre+" "+id+" "+campo+" "+tabla+" "+campoID);

    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ModificarElemento.php",
        type: "POST",
        success: function(){
            document.getElementById("txtNombreElementoM").value = "";
            document.getElementById("idM").value = "";
            document.getElementById("campoM").value = "";
            document.getElementById("tablaM").value = "";
            document.getElementById("campoIDM").value = "";

           $("#modalModificarElemento").modal('hide');
           $("#modalExito").modal();
        },
        error: function(){
            alert("error");
        }
    });  
}
    
    
}


function mostrarModalModificarS(codigo, nombre, fecha, stockMin, stockAct){
    $("#modalModificarV").modal();

    document.getElementById("txtCodigoModificarS").value = codigo;
    document.getElementById("txtNombreModificarS").value = nombre;
    document.getElementById("dtpFechaVencModificarS").value = fecha;
    document.getElementById("nudStockMinModificarS").value = stockMin;
    document.getElementById("nudStockActModificarS").value = stockAct;
}
function modificarBajoStock(){
    var codigo = document.getElementById("txtCodigoModificarS").value;
    var stockMin = document.getElementById("nudStockMinModificarS").value;
    var stockAct = document.getElementById("nudStockActModificarS").value;
    
    if(stockMin <= 0 || stockMin == '' || stockAct == '' || stockAct <= 0 || (stockMin > stockAct)){
        $("#modalError").modal();
    }
    else{
        var parametros = {
            "codigo" : codigo,
            "stockMin" : stockMin,
            "stockAct" : stockAct,
        };
        $.ajax({
            async: false,
            data: parametros,
            url: "AJAX/ModificarBajoStock.php",
            type: "POST",
            success: function(response){
                $("#modalModificarV").modal('hide');
                $('#modalExito').modal();
            }
        });
    }
}
function irBajoStock(){
    location.href = "../src/pages/StockBajo.php";
}

function superBusqueda(){
    codigo = document.getElementById("txtCodigoConsulta").value;
    proveedor = document.getElementById("cbProveedorConsulta").value;
    categoria = document.getElementById("cbCategoriaConsulta").value;
    fechaVenc = document.getElementById("dtpFechaVencConsulta").value;
    fechaAdq = document.getElementById("dtpFechaAdqConsulta").value;
    bodega = document.getElementById("cbBodegaConsulta").value;


    var parametros = {
        "codigo" : codigo,
        "proveedor" : proveedor,
        "categoria" : categoria,
        "fechaVenc": fechaVenc,
        "fechaAdq": fechaAdq,
        "bodega": bodega
    };
    $.ajax({
        async: false,
        data: parametros,
        url: "AJAX/SuperConsulta.php",
        type: "POST",
        success: function(response){
            $("#resultados").html(response);
        }
    });

}

function cerrarModal(){
    $("modalExito").modal("hide");
}