<?php



function getProductos() {
    // $mysqli = new mysqli('localhost', 'root', 'appweb', 'tp1');
    
    // if ($mysqli->connect_error) {
    //     // TODO: Escribir un log.
    //     return [];
    // } else {
    //     $sql = "select * from productos where id=".$id.";";
    //     if ($resultado = $mysqli->query($sql)) {
    //         return $resultado;
    //     } else {
    //         // TODO: Escribir en un log.
    //         return [];
    //     }
    // }
    // $db = new PDO('mysql:host=localhost;dbname=tp1', 'root', 'appweb');
    // return $db->query('show tables;');
    return [
        [
            "nombre" => "producto",
            "descripcion" => "una descripcion re peola vago",
            "precio" => 9999.00,
            "stock" => 10
        ],
        [
            "nombre" => "otro producto",
            "descripcion" => "otra descripcion re peola vago",
            "precio" => 1.00,
            "stock" => 0
        ]
    ];
}

function incrementarStock($id, $cantidad) {

}

function decrementarStock($id, $cantidad) {
    
}

?>