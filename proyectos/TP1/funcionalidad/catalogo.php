<?php

class Catalogo {
    public $servidor;
    public $puerto;
    public $esquema;
    public $usuario;
    public $clave;
    public $db;

    public function __construct($servidor = '172.21.0.2', $puerto = '3306', $esquema = 'tp1', $usuario = 'root', $clave = 'appweb') {
        $this->servidor = $servidor;
        $this->puerto = $puerto;
        $this->esquema = $esquema;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->db = new PDO("mysql:host=$servidor:$puerto;dbname=$esquema", $usuario, $clave);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     * Devuelve todos los productos del catalogo.
     * 
     * @return array
     */
    public function getProductos() {
        try {
            if ($this->db) {
                // Ejecuta la consulta.
                $consulta = $this->db->query('select * from productos;');
                return $consulta->fetchAll();
            } else {
                // TODO: No pude conectarme a la base, mostrar el error.
                return [];
            }
        } catch (PDOException $e) {
            // TODO: Ocurrio un error en la consulta.
            return [];
        }
    }

    /**
     * Devuelve un producto dado un id.
     * 
     * @param integer $id
     * @return array $producto
     */
    public function getProducto($id) {
        try {
            if ($this->db) {
                // Ejecuta la consulta.
                $consulta = $this->db->query("select * from productos where id=$id;");
                return $consulta->fetchAll();
            } else {
                // TODO: No pude conectarme a la base, mostrar el error.
                return [];
            }
        } catch (PDOException $e) {
            // TODO: Ocurrio un error en la consulta.
            return [];
        }
    }

    /**
     * Incrementa el stock de un producto.
     * 
     * @param integer $id
     * @param integer $cantidad
     * @return boolean $incrementado
     */
    public function incrementarStock($id, $cantidad) {
        try {
            if ($this->db) {
                // Ejecuta la consulta.
                $consulta = $this->db->query("select * from productos where id=$id");
                $producto = $consulta->fetch();
                
                // Verifico si el producto existe.
                if ($producto) {
                    $this->db->query("update productos set stock=".($producto['stock'] + $cantidad)." where id=$id;");
                    return true;
                } else {
                    // TODO: El producto no existe.
                    return false;
                }
            } else {
                // TODO: No pude conectarme a la base, mostrar el error.
                return false;
            }
        } catch (PDOException $e) {
            // TODO: Ocurrio un error en la consulta.
            return false;
        }
    }

    /**
     * Decrementa el stock de un producto dado en una cantidad dada.
     * 
     * @param integer $id
     * @param integer $cantidad
     * @return boolean $decrementado
     */
    public function decrementarStock($id, $cantidad) {
        try {
            if ($this->db) {
                // Ejecuta la consulta.
                $consulta = $this->db->query("select * from productos where id=$id");
                $producto = $consulta->fetch();
                
                // Verifico si el producto existe.
                if ($producto) {
                    if ($cantidad <= intval($producto['stock'])) {
                        $this->db->query("update productos set stock=".($producto['stock'] - $cantidad)." where id=$id;");
                        return true;
                    } else {
                        // TODO: La cantidad de elementos pedidos no se puede satisfacer.
                        return false;
                    }
                } else {
                    // TODO: El producto no existe.
                    return false;
                }
            } else {
                // TODO: No pude conectarme a la base, mostrar el error.
                return false;
            }
        } catch (PDOException $e) {
            // TODO: Ocurrio un error en la consulta.
            return false;
        }
    }
}
?>