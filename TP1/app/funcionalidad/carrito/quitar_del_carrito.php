<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    try {
        $servidor = '172.23.0.2'; 
        $puerto = '3306';
        $esquema = 'tp1';
        $usuario = 'appweb';
        $clave = 'testing';

        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $id_producto = $_REQUEST['id'];
        $pos_producto = $_REQUEST['posicion'];
        $cant_producto = $_REQUEST['cantidad'];

        // Devuelvo el stock.
        $consulta = $db->query('select * from productos where id='.$id_producto.';');
        $producto = $consulta->fetch(PDO::FETCH_ASSOC);
        $consulta = $db->query('update productos set stock='.($producto['stock'] + $cant_producto).' where id='.$id_producto.';');
        $producto = $consulta->fetch(PDO::FETCH_ASSOC);

        // Borro el producto del carrito.
        unset($_SESSION['carrito'][$pos_producto]);

        echo json_encode(array('resultado' => 0, 'datos' => 'Listorti'));
    } catch (PDOException $e) {
        throw new \ErrorException('No se pudo establecer la conexion con la base de datos');
    } catch (\ErrorException $e) {
        echo json_encode(array('resultado' => 9, 'datos' => $e->getMessage()));
    }
} else {
    echo json_encode(array('resultado' => 9, 'datos' => 'No estas logueado'));
}

?>