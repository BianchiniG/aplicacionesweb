<?php
header('Content-Type: application/json');

$servidor = '172.23.0.2'; 
$puerto = '3306';
$esquema = 'tp1';
$usuario = 'appweb';
$clave = 'testing';

try {
    $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    if ($db) {
        // Ejecuta la consulta.
        $consulta = $db->query('select * from productos;');
        $resultados = [];
        foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $producto) {
            $resultados []= json_encode($producto);
        } 
        echo json_encode($resultados);
    } else {
        echo json_encode("No se pudo establecer la conexion con la base de datos");
    }
} catch (PDOException $e) {
    echo json_encode($e->getMessage());
}

?>