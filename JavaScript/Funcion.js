function busqueda(){
    var texto = document.getElementById("codigo").value;

    var parametros = {
        "texto" : texto
    };
    $.ajax({
        data: parametros,
        url: "AJAX/Valida.php",
        type: "POST",
        success: function(response){
            $("#datos").html(response);
        }
    });
}

