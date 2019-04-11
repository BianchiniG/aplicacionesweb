<?php
session_start();
header('Content-Type: application/json');

try {
    // Crea la conexion con la base de datos.
    $servidor = '172.23.0.2'; 
    $puerto = '3306';
    $esquema = 'tp1';
    $usuario = 'appweb';
    $clave = 'testing';
    $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if ($db) {
        // Busco todas las compras del cliente.
        $consulta = $db->query('select * from compras where id_usuario='.$_SESSION['user_id'].';');
        // Las transformo en algo entendible por json_encode.
        $resultados = [];
        foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $k => $compra) {
            $resultados []= json_encode($compra);
        }

        // Obtener los datos del usuario
        $consulta = $db->query('select * from usuarios where id='.$_SESSION['user_id'].';');
        // Las transformo en algo entendible por json_encode.
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        echo json_encode(array('resultado' => true, 'datos' => $resultados, 'usuario' => $usuario));
    } else {
        echo json_encode(array('resultado' => false, 'datos' => 'No se pudo crear la conexion a la base de datos'));
    }
} catch (PDOException $e) {
    echo json_encode(array('resultado' => false, 'datos' => $e->getMessage()));
}

?>