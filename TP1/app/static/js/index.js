(function() {
    $.ajax({
        dataType : "json",
        contentType: "application/json; charset=utf-8",
        url: '/funcionalidad/catalogo/get_productos.php',
        method: 'GET',
        success: function(data) {
            var div_tarjetas = $('#tarjetas');
            var tarjetas_nuevas = [];

            for (indice = 0; indice < data.length; indice++) {
                dato = JSON.parse(data[indice]);

                // Compongo el boton.
                boton = "";
                if (dato['stock'] == 0) {  // Chequeo si tengo stock o no.
                    boton = "<button id=\"boton-"+dato['id']+"\" class=\"btn btn-warning disabled\">Sin Stock!</button>";
                } else {
                    boton = "<button id=\"boton-"+dato['id']+"\" onClick=\"agregarAlCarrito("+dato['id']+")\" class=\"btn btn-primary\">Agregar al Carrito!</a>";
                }

                tarjetas_nuevas.push("<div class=\"col-lg-3 col-md-6 mb-4\"> \
                    <div class=\"card h-100\"> \
                        <img class=\"card-img-top\" src=\"static/img/"+dato['id']+".jpg\" alt=\"\"> \
                        <div class=\"card-body\"> \
                            <h4 id=\""+dato['id']+"-nombre\" class=\"card-title\">"+dato['nombre']+"</h4> \
                            <p id=\""+dato['id']+"-descripcion\" class=\"card-text\">"+dato['descripcion']+"</p> \
                            <p id=\""+dato['id']+"-precio\" class=\"card-text\">$"+dato['precio']+"</p> \
                            <p id=\""+dato['id']+"-id\" class=\"card-text\" hidden=\"true\">"+dato['id']+"</p> \
                        </div> \
                        <div class=\"card-footer\"> \
                            "+boton+"\
                        </div> \
                    </div> \
                </div>");
            }
            div_tarjetas.html(tarjetas_nuevas);
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