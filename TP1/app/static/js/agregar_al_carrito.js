function agregarAlCarrito(id) {
    $.ajax({
        dataType: "json",
        url: '/funcionalidad/carrito/agregar_al_carrito.php',
        data: "id="+id,
        success: function(data) {
            // Verifico si devuelve verdadero.
            if (data['resultado']) {
                $('#mensaje-div').addClass('isa_success');
                $('#mensaje-i').addClass('fa fa-check');
                if (!data['hay_stock']) {
                    $("#boton-"+id).prop("onclick", null).off("click");
                    $('#boton-'+id).removeClass('btn-primary');
                    $('#boton-'+id).addClass('btn-warning');
                    $('#boton-'+id).text('Sin Stock!');
                }
            } else {
                if (data['logueado']) {
                    $('#mensaje-div').addClass('isa_error');
                    $('#mensaje-i').addClass('fa fa-times-circle');
                } else {
                    window.location.href = "/login.php";
                }
            }
            $('#mensaje-i').text(data['datos']);
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'No estas conectado/a. Verifica la conexion.';
            } else if (jqXHR.status == 404) {
                msg = 'Pagina no encontrada. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Error interno del servidor [500].';
            } else if (exception === 'parsererror') {
                msg = 'Error de parsing.';
            } else if (exception === 'timeout') {
                msg = 'Tiempo de espera agotado.';
            } else if (exception === 'abort') {
                msg = 'Se aborto la llamada Ajax.';
            } else {
                msg = 'Error no identificado: ' + jqXHR.responseText;
            }
            console.log(msg);
        },
        async: false
    });
}
