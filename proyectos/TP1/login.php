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
  <link rel="stylesheet" type="text/css" href="static/css/util.css">
  <link rel="stylesheet" type="text/css" href="static/css/main.css">
<!--===============================================================================================-->

</head>

<body>
  <?php require_once "funcionalidad/sesion.php"; ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Tienda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <!-- Deshabilitar si el usuario no esta logueado -->
            <a class="nav-link carrito fa fa-shopping-cart" href="carrito.php"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Bienvenido
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Iniciar Sesión
							</button>
						</div>
				</form>
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
</body>

</html>
