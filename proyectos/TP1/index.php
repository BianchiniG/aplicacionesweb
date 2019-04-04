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
  <?php require_once "funcionalidad/catalogo.php" ?>
  <?php require_once "funcionalidad/sesion.php" ?>

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
            echo "<li class=\"nav-item\">";
            echo "  <a class=\"nav-link\" href=\"#\">Cerrar Sesion</a>";
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <header class="jumbotron my-4"></header>
    <div class="row text-center">

    <?php 
    $catalogo = new Catalogo();
    $productos = $catalogo->getProductos();

    if (count($productos)) {
      foreach ($productos as $producto) {
          echo "<div class=\"col-lg-3 col-md-6 mb-4\">";
            echo "<div class=\"card h-100\">";
              echo "<img class=\"card-img-top\" src=\"http://placehold.it/500x325\" alt=\"\">";
              echo "<div class=\"card-body\">";
                echo "<h4 class=\"card-title\">".$producto['nombre']."</h4>";
                echo "<p class=\"card-text\">".$producto['descripcion']."</p>";
                echo "<p class=\"card-text\">".$producto['precio']."</p>";
             echo " </div>";
              echo "<div class=\"card-footer\">";
                if ($producto['stock'] == 0) {
                  echo "<a href=\"#\" class=\"btn btn-primary disabled\">Sin Stock!</a>";
                } else {
                  echo "<a href=\"#\" class=\"btn btn-primary\">Agregar al Carrito!</a>";
                }
             echo " </div>";
           echo " </div>";
         echo " </div>";
      }
    } else {
      echo "<p>No se encontraron productos.</p>";
    }
    ?>
    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Aguila Maximiliano - Bianchini German</p>
    </div>
  </footer>

  <script src="static/js/jquery.min.js"></script>
  <script src="static/js/bootstrap.bundle.min.js"></script>
</body>

</html>
