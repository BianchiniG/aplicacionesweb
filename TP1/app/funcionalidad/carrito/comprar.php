<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    try {
        // Creo la conexion con la base de datos.
        $servidor = '172.23.0.2'; 
        $puerto = '3306';
        $esquema = 'tp1';
        $usuario = 'appweb';
        $clave = 'testing';
        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // Creo la compra (TODO: Cambiar el timezone a GMT-3).
        $precio_final = $_REQUEST['precio_final'];
        $consulta = $db->query("insert into compras (id_usuario, fecha, precio_final) values (".$_SESSION['user_id'].", '".date("Y-m-d h:m:s")."', ".$precio_final.");");
        $consulta->fetch(PDO::FETCH_ASSOC);

        // Obtenemos la compra que acabamos de hacer.
        $consulta = $db->query("select id from compras where id_usuario=".$_SESSION['user_id']." order by id desc limit 1;");
        $compra = $consulta->fetch(PDO::FETCH_ASSOC);

        // Creo los detalles de la compra.
        foreach ($_SESSION['carrito'] as $k => $item) {
            $consulta = $db->query("insert into detalles_compras (id_compra, id_producto, cantidad, precio_unitario) values (".$compra['id'].", ".$item['id'].", ".$item['cantidad'].", ".$item['precio'].");");
            $detalle_compra = $consulta->fetch(PDO::FETCH_ASSOC);
        }

        // Limpiamos el carrito
        $_SESSION['carrito'] = array();

        echo json_encode(array('resultado' => true, 'datos' => 'La compra se realizo con exito!'));
    } catch (PDOException $e) {
        echo json_encode(array('resultado' => false, 'datos' => $e->getMessage()));
    } catch (\ErrorException $e) {
        echo json_encode(array('resultado' => false, 'datos' => $e->getMessage()));
    }
} else {
    echo json_encode(array('resultado' => false, 'datos' => 'No estas logueado'));
}
?>