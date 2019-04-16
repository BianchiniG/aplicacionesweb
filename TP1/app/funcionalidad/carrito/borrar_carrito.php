<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    try {
        // Creamos la conexion con la base de datos.
        $servidor = '172.20.0.2'; 
        $puerto = '3306';
        $esquema = 'tp1';
        $usuario = 'appweb';
        $clave = 'testing';
        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // Recorremos el carrito y borramos los items.
        foreach ($_SESSION['carrito'] as $k => $item) {
            // Devuelvo el stock.
            $consulta = $db->query('select * from productos where id='.$item['id'].';');
            $producto = $consulta->fetch(PDO::FETCH_ASSOC);
            $consulta = $db->query('update productos set stock='.($producto['stock'] + $item['cantidad']).' where id='.$item['id'].';');
            $producto = $consulta->fetch(PDO::FETCH_ASSOC);

            // Borro el producto del carrito.
            unset($_SESSION['carrito'][$k]);
        }

        echo json_encode(array('resultado' => true, 'datos' => 'Listorti'));
    } catch (PDOException $e) {
        echo json_encode(array('resultado' => false, 'logueado' => true,  'datos' => $e->getMessage()));
    } catch (\ErrorException $e) {
        echo json_encode(array('resultado' => false, 'logueado' => true,  'datos' => $e->getMessage()));
    }
} else {
    echo json_encode(array('resultado' => true, 'logueado' => false, 'datos' => 'No estas logueado'));
}

?>