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
}

function array(){
    var filas = $('#tBody').find('tr');
    var arrays = []
    for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        codigo= $(celdas[0]).text();
        cantidad = $($(celdas[3]).children("input")[0]).val();
        var arrays2 = [];
        arrays2.push(codigo);
        arrays2.push(cantidad);
        arrays.push(arrays2);
    }


    var parametros = {
        "array" : arrays
    };
    $.ajax({
        data: parametros,
        url: "AJAX/ConsultarProducto.php",
        type: "POST",
        success: function(response){
            $("#modalResultado").html(response);
            $("#modalResultado").modal();
            $("#modalError").modal();
        },
        error: function(response){
            $("#modalResultado").html(response);
            $("#modalError").modal();
        }
    });



    

    
}