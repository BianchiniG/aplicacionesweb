function getDetalles(id) {
    $.ajax({
        dataType : "json",
        contentType: "application/json; charset=utf-8",
        url: '/funcionalidad/perfil/get_detalles.php',
        method: 'GET',
        data: "id="+id,
        success: function(data) {
            if (data['resultado']) {
                usuario = data['usuario'];
                // Le pone el titulo al modal
                $('#titulo-modal').text("Compra N°"+id);
                // Completa los datos de la compra
                compra = data['compra'];
                $('#fecha-compra-modal').text(compra['fecha']);
                // Completa los datos de los detalles
                detalles = data['detalles'];
                html = "";
                total = 0;
                $('#detalles').find("tr:gt(0)").remove();
                for (indice = 0; indice < detalles.length; indice++) {
                    dato = JSON.parse(detalles[indice]);

                    html += "<tr> \
                        <td>"+dato['id_producto']+"</td> \
                        <td>"+dato['nombre']+"</td> \
                        <td>"+dato['cantidad']+"</td> \
                        <td>"+dato['precio_unitario']+"</td> \
                    </tr>";

                    total += dato['precio_unitario'] * dato['cantidad'];
                }
                html += "<tr> \
                            <td></td> \
                            <td></td> \
                            <td><strong>Total:</strong></td> \
                            <td><strong>"+total+"</strong></td> \
                        </tr>";
                
                $("#detalles tbody").append(html);
                $('#myModal').modal('toggle');
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
}