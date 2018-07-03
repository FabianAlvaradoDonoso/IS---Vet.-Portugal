function busqueda2(){
    var texto = document.getElementById("fechaEsp").value;

    alert(texto);
    var parametros = {
        "fechaEsp" : texto
    };
    $.ajax({
        data: parametros,
        url: "AJAX/Valida2.php",
        type: "POST",
        success: function(response){
            $("#datos1").html(response);
        }
    });
}

