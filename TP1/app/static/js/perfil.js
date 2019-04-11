(function() {
    $.ajax({
        dataType : "json",
        contentType: "application/json; charset=utf-8",
        url: '/funcionalidad/perfil/get_compras.php',
        method: 'GET',
        success: function(data) {
            if (data['resultado']) {
                // Completo los datos del usuario
                $('#id-usuario').text(data['usuario']['id']);
                $('#nombre-usuario').text(data['usuario']['nombre']);
                $('#email-usuario').text(data['usuario']['email']);

                // Completo la tabla de compras
                var datos = data['datos'];
                for (indice = 0; indice < datos.length; indice++) {
                    dato = JSON.parse(datos[indice]);
                    $html = "<tr> \
                      <td>"+dato['id']+"</td> \
                      <td>"+dato['fecha']+"</td> \
                      <td>$"+dato['precio_final']+"</td> \
                      <td><button id=\"detalles-"+dato['id']+"\" onClick=\"getDetalles("+dato['id']+")\" class=\"btn btn-info\"><i class=\"fa fa-eye\"></i></button></td> \
                    </tr>";
                    $("#mis-compras tbody").append($html);
                }
            } else {
                $('#mensaje-div').addClass('isa_error');
                $('#mensaje-i').addClass('fa fa-times-circle');
                $('#mensaje-i').text(data['datos']);
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
})(jQuery);