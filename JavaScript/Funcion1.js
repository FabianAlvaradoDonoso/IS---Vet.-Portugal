<script src="vendor/jquery/jquery.min.js"></script>;
<script src="vendor/popper.js/umd/popper.min.js"></script>;
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>;
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>;
<script src="vendor/chart.js/Chart.min.js"></script>;
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>;

function limpiarBusquedas(){
    document.getElementById("txtCodigo").value="";
    document.getElementById("txtNombre").value="";
}
$(function () {
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
});
function pulsar(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
        buscarProducto(document.getElementById("txtCodigo").value);
        limpiarBusquedas();
    }
}
function buscarProducto(codigo){
    var texto = codigo;
    
    var parametros = {
        "txtCodigo" : texto
    };
    $.ajax({
        data: parametros,
        url: "AJAX/BuscarProductosCodigo.php",
        type: "POST",
        success: function(response){
            $("#filas").html(response);
        }
    });
}

function myCreateFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(2);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
    cell3.innerHTML = "NEW CELL3";
    cell4.innerHTML = "<input type='number' class='form-control' value='1'/>";
    cell5.innerHTML = "<input type='button' class='borrar' value='Eliminar' />";
}