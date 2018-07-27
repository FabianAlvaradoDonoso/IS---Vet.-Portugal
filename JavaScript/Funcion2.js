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

    if(document.getElementById("modFechaAgregar").checked == true){
        texto7 = 'null';
    }
    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || (texto7 != '' && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalErrorAgregar").modal();
        document.getElementById("cerrarError").focus();
    }
    if(texto7 == ''){texto7 = 'null'}
    else
    {
        if(comprobarCodigo(texto1) != false){
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
                    $("#modalBienAgregar").modal();
                    document.getElementById("cerrarBien").focus();
                    limpiarAgregar();
                    var div =   $("#card1").html();
                    document.getElementById("card1").load(div);
                },
                error: function(){
                    alert("error");
                }
            });
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
                $("#modalBien").modal();
                document.getElementById("cerrarBien").focus();
                limpiarTodo();
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
                $("#modalBien").modal();
                document.getElementById("cerrarBien").focus();
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
                $("#modalEliminarBien").modal();
                document.getElementById("cerrarBienE").focus();
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

function solicitudVerificar(){
    alert("entró en solicitud");
    $("#modalPASS").modal();
}
function verificar(pass){
    var password = document.getElementById("txtAdminPass").value="";
    var permiso;
    if(pass==password){
        permiso=true;
    }
    else{ permiso=false;}
    $("#modalPASS").modal('hide');
    return permiso;
}
//=================Configs======================//

function nuevoUsuario(){
 
    var nombre= document.getElementById("txtUserNombre").value;
    var user=document.getElementById("txtUserUser").value;
    var pass=document.getElementById("txtUserPass").value;
    var check=document.getElementById("switch-sm").checked;
    var cargo;
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
           
           $("#modalAgregarUsuario").modal('hide');
           $("#modalExito").modal();
        }
    });   
}
function mostrarModalAgregarUsuario(){
    $("#modalAgregarUsuario").modal();

}

function updateDiv(){
    $( "#recargar" ).load(window.location.href + " #recargar" );
    // $("#modalExito").modal('hide');
}

function borrar(){
    var id = document.getElementById("idUser").value;
    var parametros = {
        "id" : id
    };
    $.ajax({
        async: false,
        data: parametros,
        url: "AJAX/EliminarUsuario.php",
        type: "POST",
        
        success: function(){
            $("#modalPreparacionEliminacion").modal('hide');
            $("#modalExito").modal(); 
        }
    }); 
}
function previoEliminacion(id){
    document.getElementById("idUser").value=id;
    $("#modalPreparacionEliminacion").modal(); 
   
}
function mostrarModalAgregarElemento(){
    $("#modalAgregarElemento").modal();
}
function nuevoElemento(){
    var nombre= document.getElementById("txtElementoNombre").value;
    var parametros = {
        "txtElementoNombre": nombre
    }
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/CrearCategoria.php",
        type: "POST",
        success: function(){
           $("#modalAgregarElemento").modal('hide');
           $("#modalExito").modal();
        }
    });   
}

function mostrarModificarCategoria(){
    $("#modalModificarCategoria").modal();
}
function modificarCategoria(id){
    var nombre = document.getElementById("txtModificarNombre").value;
    var parametros = {
        "txtModificarNombre": nombre,
        "ID": id
    }
    $.ajax({
        async:false,
        data: parametros,
        url: "AJAX/ModificarCategoria.php",
        type: "POST",
        success: function(){
            document.getElementById("txtModificarNombre").value = "";
           $("#modalModificarCategoria").modal('hide');
           $("#modalExito").modal();
        },
        error: function(){
            alert("error");
        }
    });  
}