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
                $("#modalModificar").modal("hide");
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

function mostrarModalEliminar(){

}


//===========================E N V I A R====================================================
function enviarFechaEsp(){
    var texto = document.getElementById("fechaEsp").value;

    var parametros = {
        "fechaEsp" : texto
    };
    $.ajax({
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
