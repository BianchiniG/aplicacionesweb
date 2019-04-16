<?php
session_start();
header('Content-Type: application/json');

// Verifico si el usuario esta logueado.
if (isset($_SESSION['user_id'])) {
    $servidor = '172.20.0.2'; 
    $puerto = '3306';
    $esquema = 'tp1';
    $usuario = 'appweb';
    $clave = 'testing';

    $id_libro = $_REQUEST["id"];

    try {
        $db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        if ($db) {
            // Ejecuta la consulta.
            $consulta = $db->query('select * from productos where id='.$id_libro.';');
            $producto = $consulta->fetch(PDO::FETCH_ASSOC);

            // Verifico si tengo stock
            if ($producto['stock'] > 0) {
                // Veo si ya esta.
                $esta = -1;
                foreach ($_SESSION['carrito'] as $k => $item) {
                    if ($item['id'] == $id_libro) {
                        $esta = $k;
                        break;
                    }
                }
                if ($esta >= 0) {
                    $_SESSION['carrito'][$esta]['cantidad'] += 1; 
                } else {
                    $nuevo = [
                        'id' => $producto['id'],
                        'nombre' => $producto['nombre'],
                        'descripcion' => $producto['descripcion'],
                        'precio' => $producto['precio'],
                        'cantidad' => 1
                    ];
                    $_SESSION['carrito'] []= $nuevo;
                }

                // Decremento el stock.
                $consulta = $db->query('update productos set stock='.($producto['stock'] - 1).' where id='.$id_libro.';');

                // Consulto si queda stock de este producto.
                $consulta = $db->query('select * from productos where id='.$id_libro.';');
                $producto = $consulta->fetch(PDO::FETCH_ASSOC);

                $hay = true;
                if ($producto['stock'] <= 0) {
                    $hay = false;
                }
                echo json_encode(array("resultado" => true, "hay_stock" => $hay, "datos" => "El producto '".$producto['nombre']."' fue agregado al carrito!"));
            }
        } else {
            // Escribir log.
            echo json_encode(array("resultado" => false, "logueado" => true, "datos" => "No se pudo establecer la conexion con la base de datos"));
        }
    } catch (PDOException $e) {
        // Escribir log.
        echo json_encode(array("resultado" => false, "logueado" => true, "datos" => $e->getMessage()));
    } catch (\ErrorException $e) {
        echo json_encode(array("resultado" => false, "logueado" => true, "datos" => $e->getMessage()));
    }
} else {
    echo json_encode(array("resultado" => false, "logueado" => false, "datos" => "No estas logueado!"));
}

?>
