function limpiarBusquedas(){
    document.getElementById("txtCodigo").value="";
}
$(function () {
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        calcular();
    });
});
function pulsar(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscar();   
    }
}



function buscar(){   
    var texto = document.getElementById("txtCodigo").value;

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
function buscarNombre(){   
    var texto = document.getElementById("txtNombre").value;

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


function eliminarTrs(){
    //event.preventDefault();
    $("#tablaVentas").find("tr:gt(0)").remove();
    calcular();
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


//======================P R O D U C T O S==========================\\

