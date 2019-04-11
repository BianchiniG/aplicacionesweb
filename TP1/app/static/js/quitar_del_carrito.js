function quitarDelCarrito(id, posicion, cantidad) {
    $.ajax({
        dataType: "json",
        url: '/funcionalidad/carrito/quitar_del_carrito.php',
        data: "id="+id+"&posicion="+posicion+"&cantidad="+cantidad,
        success: function(data) {
            if (data['resultado'] == 0) {
                location.reload();
            } else {
                $('#mensaje-div').addClass('isa_error');
                $('#mensaje-i').addClass('fa fa-times-circle');
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