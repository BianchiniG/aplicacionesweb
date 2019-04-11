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
  <?php require_once "funcionalidad/sesion.php" ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Tienda</a>
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
    <header class="jumbotron my-4"></header>
    <div id="mensaje-div"><i id="mensaje-i"></i><p id="mensaje-p"></p></div>
    <div id="tarjetas" class="row text-center">
    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Aguila Maximiliano - Bianchini German</p>
    </div>
  </footer>

  <script src="static/js/jquery-3.3.1.js"></script>
  <script src="static/js/bootstrap.js"></script>
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="static/js/index.js"></script>
  <script src="static/js/agregar_al_carrito.js"></script>
</body>
</html>
