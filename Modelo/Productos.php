<?php
require_once "conexion.php";

class Producto {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function validar($data) {
        $errores = [];

        if (empty($data['codigo'])) $errores[] = "El código es obligatorio";
        if (empty($data['producto'])) $errores[] = "El nombre del producto es obligatorio";
        if (!is_numeric($data['precio'])) $errores[] = "El precio debe ser numérico";
        if (!is_numeric($data['cantidad'])) $errores[] = "La cantidad debe ser numérica";

        return $errores;
    }

    public function guardar($data) {
        $sql = "INSERT INTO productos (codigo, producto, precio, cantidad)
                VALUES (?, ?, ?, ?)";

        return $this->db->insertSeguro($sql, [
            $data['codigo'],
            $data['producto'],
            $data['precio'],
            $data['cantidad']
        ]);
    }

    public function editar($data) {
        $sql = "UPDATE productos SET codigo=?, producto=?, precio=?, cantidad=? WHERE id=?";

        return $this->db->updateSeguro($sql, [
            $data['codigo'],
            $data['producto'],
            $data['precio'],
            $data['cantidad'],
            $data['id']
        ]);
    }

    public function buscar($codigo) {
        return $this->db->query("SELECT * FROM productos WHERE codigo=?", [$codigo]);
    }

    public function listar() {
        return $this->db->query("SELECT * FROM productos ORDER BY id DESC");
    }
}
?>
