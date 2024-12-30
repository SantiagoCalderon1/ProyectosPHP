<?php
include '../../config/conexion.php';

class Producto
{
    private $conexion;

    public function __construct(
        private String $nombre = '',
        private int $cantidad = 0,
        private float $precio = 0,
    ) {
        $this->conexion = conexion();
    }

    function obtenerDatos($productoId): array
    {
        $sql = "SELECT * FROM productos WHERE productoId = {$productoId};";
        $resultado = $this->conexion->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    function insertarDatos(): bool
    {
        $sql = "INSERT INTO productos (nombre, cantidad, precio) VALUES ('{$this->nombre}','{$this->cantidad}','{$this->precio}');";
        return ($this->conexion->query($sql)) ? true : false;
    }

    function actualizarDatos(int $productoId, string $newNombre, int $newCantidad, float $newPrecio): bool
    {
        $this->setNombre($newNombre)->setCantidad($newCantidad)->setPrecio($newPrecio);
        $sql = "UPDATE productos SET nombre= '{$this->nombre}',cantidad= '{$this->cantidad}',precio= '{$this->precio}' WHERE productoId= {$productoId};";
        return ($this->conexion->query($sql)) ? true : false;
    }

    function eliminarDatos(int $productoId): bool
    {
        $sql = "DELETE  FROM productos WHERE productoId={$productoId};";
        return ($this->conexion->query($sql)) ? true : false;
    }

    static function getAll()
    {
        $sql = "SELECT * FROM productos ORDER BY nombre ASC;";
        $conexion = conexion();
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    static function getVentasProducto($productoId){
        $sql = "SELECT * FROM pedidos WHERE productoId = {$productoId} ORDER BY fecha DESC;";
        $conexion = conexion();
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    function getNombre(): String
    {
        return $this->nombre;
    }

    function getCantidad(): int
    {
        return $this->cantidad;
    }

    function getPrecio(): float
    {
        return $this->precio;
    }

    function setNombre(string $newNombre): object
    {
        $this->nombre = $newNombre;
        return $this;
    }

    function setCantidad(int $newCantidad): object
    {
        $this->cantidad = $newCantidad;
        return $this;
    }

    function setPrecio(float $newPrecio): object
    {
        $this->precio = $newPrecio;
        return $this;
    }
}
