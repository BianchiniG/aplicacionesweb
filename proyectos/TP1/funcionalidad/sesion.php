<?php
function login() {
    require_once "credenciales.php";

    session_set_cookie_params(3600,"/");
    session_start();
    
    if ( isset( $_POST['email'] ) && isset( $_POST['pass'] ) ) {
        // Creamos la conexion a la base.
        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        // Verificamos si el usuario existe.
        try {
            // Chequeo si existe el usuario en la base.
            $email_request = $_POST['email'];
            $clave_request = $_POST['pass'];
    
            $sql = "select * from usuarios where email='$email_request' and clave='$clave_request';";
            $consulta = $db->query($sql);
            $usuario = $consulta->fetch();
    
            if ($usuario) {
                $_SESSION['valid'] = true;
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['username'] = $usuario['nombre'];
                $_SESSION['password'] = $usuario['clave'];
                $_SESSION['carrito'] = [];
                
                header('Location: index.php');
            } else {
            }
        } catch (PDOException $e) {
        }
    }
}

function logout() {
    session_destroy();
}
?>