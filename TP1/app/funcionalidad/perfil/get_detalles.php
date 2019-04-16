<?php
session_start();
header('Content-Type: application/json');

try {
    try {
        // Crea la conexion con la base de datos.
        $servidor = '172.20.0.2'; 
        $puerto = '3306';
        $esquema = 'tp1';
        $usuario = 'appweb';
        $clave = 'testing';
        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $id_compra = $_REQUEST['id'];
    
        if ($db) {
            // Obtengo la compra.
            $consulta = $db->query("select * from compras where id=".$id_compra.";");
            $compra = $consulta->fetch(PDO::FETCH_ASSOC);
            // Obtengo los detalles de la compra.
            $consulta = $db->query("select * from (select detalles_compras.id, detalles_compras.id_compra, productos.id as id_producto, productos.nombre, detalles_compras.cantidad, detalles_compras.precio_unitario from detalles_compras join productos on detalles_compras.id_producto = productos.id) as datos where datos.id_compra=".$id_compra.";");
            $detalles = [];
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $k => $detalle) {
                $detalles []= json_encode($detalle);
            }
    
            echo json_encode(array('resultado' => true, 'compra' => $compra, 'detalles' => $detalles));
        } else {
            echo json_encode(array('resultado' => false, 'datos' => 'No se pudo crear la conexion a la base de datos'));
        }
    } catch (\ErrorException $e) {
        echo json_encode(array('resultado' => false, 'datos' => $e->getMessage()));
    }
} catch (PDOException $e) {
    echo json_encode(array('resultado' => false, 'datos' => $e->getMessage()));
}
?>