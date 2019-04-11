<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplicaciones Web - Trabajo Practico N°1</title>

  <link href="static/css/bootstrap.min.css" rel="stylesheet">
  <link href="static/css/heroic-features.css" rel="stylesheet">
  <link href="static/css/font-awesome.css" rel="stylesheet">
  <link href="static/css/app.css" rel="stylesheet">
</head>

<body>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="titulo-modal" class="modal-title"></h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h5>Datos de la compra</h5>
          <div class="row">
            <div class="col-md-6">
              <p>Fecha de compra</p>
            </div>
            <div class="col-md-6">
              <p id="fecha-compra-modal"></p>
            </div>
          </div>
          <hr>
          
          <h5>Detalles</h5>
          <table id="detalles" class="table table-hover">
            <thead>
              <th>#</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Tienda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
          if (!isset($_SESSION['user_id'])) {
            echo "<li class=\"nav-item\">";
            echo "  <a class=\"nav-link\" href=\"login.php\">Iniciar Sesion</a>";
            echo "</li>";
          } else {
            echo "<li class=\"nav-item\">";
            echo "  <a class=\"nav-link carrito fa fa-shopping-cart\" href=\"carrito.php\"></a>";
            echo "</li>";
            echo "<li class=\"nav-item dropdown\">";
            echo "  <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
                echo $_SESSION['username'];
            echo "  </a>";
            echo "  <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">";
            echo "    <a class=\"dropdown-item\" href=\"/perfil.php\">Perfil</a>";
            echo "    <a class=\"dropdown-item\" href=\"/logout.php\">Cerrar Sesion</a>";
            echo "  </div>";
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div style="height: 10px;"></div>
    <div id="mensaje-div"><i id="mensaje-i"></i><p id="mensaje-p"></p></div>
    <div style="height: 10px;"></div>
    <div class="row">
      <div class="col-md-3">
        <h3>Informacion</h3>
        <table class="table">
          <tbody>
            <tr>
              <td>Id. Usuario</td><td id="id-usuario"></td>
            </tr>
            <tr>
              <td>Nombre</td><td id="nombre-usuario"></td>
            </tr>
            <tr>
              <td>Email</td><td id="email-usuario"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-9">
        <h3>Mis Compras</h3>
        <table id="mis-compras" class="table table-hover">
          <thead>
            <th>#</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Detalles</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Aguila Maximiliano - Bianchini German</p>
    </div>
  </footer>

  <script src="static/js/jquery.min.js"></script>
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="static/js/perfil.js"></script>
  <script src="static/js/get_detalles.js"></script>
</body>

</html>
