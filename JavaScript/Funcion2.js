//===========================M O D A L S====================================================

function mostrarModal(codigo, categoria, proveedor, nombre, bodega){
    $("#modalEliminar").modal();
    document.getElementById("txtCodigoModalE").value=codigo;
    buscarSelect(document.getElementById("cbCategoriaModalE"), categoria);
    buscarSelect(document.getElementById("cbProveedorModalE"), proveedor);
    document.getElementById("txtNombreModalE").value=nombre;
    buscarSelect(document.getElementById("cbBodegaModalE"), bodega);
}
function mostrarModalModificar(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega){
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
}
function mostrarModalModificar2(codigo,categoria, proveedor, nombre, precioVenta, precioNeto, fechaVenc, fechaAdq, stockMin, stockAct, bodega){
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

    if(texto1 == '' || texto2 == '' || texto3 == '' || texto4 == '' || texto5 == '' || texto6 == '' || texto8 == '' || texto9 == '' || texto10 == '' || texto11 == '' || (texto7 != '' && new Date(texto8).getTime() > new Date(texto7).getTime()))
    {
        $("#modalErrorAgregar").modal();
        document.getElementById("cerrarError").focus();
    }
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
                data: parametros,
                url: "AJAX/AgregarProducto.php",
                type: "POST",
                success: function(response){
                    $("#modalAgr egar").modal("hide");
                    $("#modalBienAgregar").modal();
                    document.getElementById("cerrarBien").focus();
                    limpiarAgregar();
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


    if(texto8 == '' || new Date(texto8).getTime() > new Date(texto7).getTime() ||texto5 < 0 || texto5 == '' || texto4 == '' || texto6 < 0 || texto6 == '' || texto9 <= 0 || texto9 == '' || texto10 < 0 || texto10 == '')
    {
        $("#modalError").modal();
        document.getElementById("cerrarError").focus();
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
            data: parametros,
            url: "AJAX/ModificaProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalModificar2").modal("hide");
                $("#modalBien").modal();
                document.getElementById("cerrarBien").focus();
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
            data: parametros,
            url: "AJAX/EliminarProductoAJAX.php",
            type: "POST",
            success: function(response){
                $("#modalEliminar").modal("hide");
                $("#modalEliminarBien").modal();
                document.getElementById("cerrarBienE").focus();
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
            $("#datos1").html(response);
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
                $("#datos1").html(response);
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
            $("#datos2").html(response);
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
                $("#datos2").html(response);
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
            $("#datos").html(response);
            pulsar(event);
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
            $("#datosNombre").html(response);
        }
    });
}
function pulsar(e) {
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
            $("#datosOtro").html(response);
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
    document.getElementById("datos1").innerHTML='';
    limpiaTodo()
}
function limpiarFormularioFecha2() {
    document.getElementById("fechaVEsp").value = "";
    document.getElementById("fechaVRDesde").value = "";
    document.getElementById("fechaVRHasta").value = "";
    //document.getElementById("fechaEsp").focus();
    document.getElementById("datos2").innerHTML='';
    limpiaTodo()
}

function limpiarFormulario() {
    document.getElementById("codigo").value = "";
    //busqueda();
    document.getElementById("codigo").focus();
    document.getElementById("datos").innerHTML='';
    limpiaTodo();
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
    document.getElementById("datosOtro").innerHTML='';
   
}
function limpiarFormularioNombre() {
    document.getElementById("nombre1").value = "";
    busquedaNombre();
    document.getElementById("nombre1").focus();
    document.getElementById("datosNombre").innerHTML='';
    limpiaTodo()
}
function limpiaTodo(){
    document.getElementById("codigo").value="";
    document.getElementById("nombre1").value="";
    document.getElementById("fechaVEsp").value="";
    document.getElementById("fechaVRDesde").value="";
    document.getElementById("fechaVRHasta").value="";
    document.getElementById("fechaEsp").value="";
    document.getElementById("fechaRDesde").value="";
    document.getElementById("fechaRHasta").value="";
    document.getElementById("datos").innerHTML='';
    document.getElementById("datosNombre").innerHTML='';
    document.getElementById("datos2").innerHTML='';
    document.getElementById("datos1").innerHTML='';
    document.getElementById("datosOtro").innerHTML='';
    document.getElementById("borrarOtro").onclick();
    
    
}
