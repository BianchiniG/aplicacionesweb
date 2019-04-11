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
    <div style="height: 5px;"></div>
    <div id="mensaje-div"><i id="mensaje-i"></i><p id="mensaje-p"></p></div>
    <table id="tabla-carrito" class="table table-hover">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Eliminar</th>
            <th></th>
        </thead>
        <tbody>
          <?php
          $total = 0;

          foreach ($_SESSION['carrito'] as $k => $item) {
            echo "<tr>'";
            echo "  <td>".$item['id']."</td>'";
            echo "  <td>".$item['nombre']."</td>'";
            echo "  <td>".$item['descripcion']."</td>'";
            echo "  <td>$".$item['precio']."</td>'";
            echo "  <td>".$item['cantidad']."</td>'";
            echo "  <td><button onClick=\"quitarDelCarrito(".$item['id'].", ".$k.", ".$item['cantidad'].")\" class=\"btn btn-danger\"><i class=\"fa fa-close\"></i></button></td>";
            echo "</tr>'";
            $total += $item['precio'] * $item['cantidad'];
          }
          echo "<tr>";
          echo "  <td></td>";
          echo "  <td></td>";
          echo "  <td><strong>Total:</strong></td>";
          echo "  <td id=\"precio-final\"><strong>$".$total."</strong></td>";
          echo "  <td></td>";
          echo "  <td></td>";
          echo "</tr>";
          ?>
        </tbody>
    </table>

    <div class="row">
      <div class="col-md-6">
        <?php
        if (count($_SESSION['carrito'])) {
          echo "<button id=\"boton-borrar-carrito\" onClick=\"borrarCarrito()\" class=\"btn btn-danger pull-left boton-borrar-carrito\">Borrar Carrito</button>";
        } else {
          echo "<button id=\"boton-borrar-carrito\" onClick=\"borrarCarrito()\" class=\"btn btn-danger pull-left boton-borrar-carrito\" disabled=\"disabled\">Borrar Carrito</button>";
        }
        ?>
      </div>
      <div class="col-md-6">
        <?php
        if (count($_SESSION['carrito'])) {
          echo "<button id=\"boton-comprar\" onClick=\"comprar()\" class=\"btn btn-success pull-right boton-comprar\">Comprar</button>";
        } else {
          echo "<button id=\"boton-comprar\" onClick=\"comprar()\" class=\"btn btn-success pull-right boton-comprar\" disabled=\"disabled\">Comprar</button>";
        }
        ?>
      </div>
    </div>
    <div style="height: 20px;"></div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Aguila Maximiliano - Bianchini German</p>
    </div>
  </footer>

  <script src="static/js/jquery.min.js"></script>
  <script src="static/js/bootstrap.bundle.min.js"></script>
  <script src="static/js/quitar_del_carrito.js"></script>
  <script src="static/js/borrar_carrito.js"></script>
  <script src="static/js/comprar.js"></script>
</body>

</html>
