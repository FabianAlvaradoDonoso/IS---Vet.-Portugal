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
            limpiarBusquedas();
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
                limpiarBusquedas();
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
            limpiarBusquedas();
            document.getElementById("txtCodigo").focus();
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
                limpiarBusquedas();
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
        $("#modalAgregarPaquete").modal("hide");
        $("#modalPaqueteError").modal();
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
    eliminarProductosPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
    eliminarPaquete(document.getElementById("txtCodigoPaqueteModificar").value);
    var nombre = document.getElementById("txtNombrePaqueteModificar").value.replace(/["']/g, "");
    var precio = document.getElementById("txtPrecioPaqueteModificar").value;
    var tipoPaquete = document.getElementById("cbPaqueteModificar").value;
    var favorito = document.getElementById("favoritoModificar").checked;
    var color;
    var filas = $('#tBodyModificar').find('tr');


    if(precio == ''){precio = document.getElementById("precioTotalModificar").innerHTML.replace('.', '')}

    if(nombre == '' || tipoPaquete == '' || precio == 0 || filas.length == 0)
    {
        $("#modalAgregarPaquete").modal("hide");
        $("#modalPaqueteError").modal();
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
    $("#modalExito2").modal();
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

//------------------CONFIG--------------------//

function cargarUsuarios(nombre,user,pass,cargo){

    var parametros = {
        'nombre': nombre,
        'user': user,
        'pass': pass,
        'cargo': cargo
    };
    $ajax({
        data : parametros,
        url: "AJAX/ObtenerUsuarios.php",
        type: "POST",
        success: function(response){
            $('#ULista').html(response);
        }
    })
}
