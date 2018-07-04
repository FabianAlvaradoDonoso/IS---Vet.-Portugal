//---------------------------E N V I A R----------------------------------------------------
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

//---------------------------L I M P I A R----------------------------------------------------
function removeOptions(selectbox)
{
    var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
    {
        selectbox.remove(i);
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
    limpiaTodo()
}
function limpiarFormulario2() {
    $('#otroSelect option').prop('selected', function() {
        return this.defaultSelected;
    });
    removeOptions(document.getElementById("otro2Select"));
    
    document.getElementById("datosOtro").innerHTML='';
    limpiaTodo()
   
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
    limpiarFormulario2();
    document.getElementById("datos").innerHTML='';
    document.getElementById("datosNombre").innerHTML='';
    document.getElementById("datos2").innerHTML='';
    document.getElementById("datos1").innerHTML='';
    document.getElementById("datosOtros").innerHTML='';
    
}
