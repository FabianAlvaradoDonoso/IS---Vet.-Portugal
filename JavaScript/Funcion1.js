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
// function pulsar(e) {
//     if (e.keyCode === 13 && !e.shiftKey) {
//         e.preventDefault();
//         alert("antes");
//         buscarProducto(document.getElementById("txtCodigo").value);
//         alert("despues");
//         limpiarBusquedas();
//     }
//     alert("antes");
// }




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
            $("#tablaVentas").append(response);
            limpiarBusquedas();
            document.getElementById("txtCodigo").focus();
        }
    });
}        