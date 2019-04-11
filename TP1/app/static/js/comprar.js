function comprar() {
    var precio_final = $('#precio-final').text().replace("$", "");

    $.ajax({
        dataType: "json",
        url: '/funcionalidad/carrito/comprar.php',
        data: "precio_final="+precio_final,
        success: function(data) {
            if (data['resultado']) {
                // Mostrar mensaje de exito
                $('#mensaje-div').addClass('isa_success');
                $('#mensaje-i').addClass('fa fa-check');
                $('#mensaje-i').text(data['datos']);
                $('#boton-comprar').attr("disabled", true);
                $('#boton-borrar-carrito').attr("disabled", true);
                $('#tabla-carrito').find("tr:gt(0)").remove();
            } else {
                $('#mensaje-div').addClass('isa_error');
                $('#mensaje-i').addClass('fa fa-times-circle');
                $('#mensaje-i').text("No se pudo realizar la compra.");
                console.log(data['datos']);
            }
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
    });
}