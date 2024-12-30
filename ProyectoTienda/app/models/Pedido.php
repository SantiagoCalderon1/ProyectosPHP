<?php
include 'conexion.php';

class Pedido
{
    private const CONEXION = conexion();

    public function __construct(
        private int $productoId = 0,
        private int $clienteId = 0,

        private string $fecha = '',
        private float $precio = 0,
        private string $descripcion = ''
    ) {}

    function obtenerDatos($pedidoId): array
    {
        $sql = "SELECT * FROM pedidos WHERE pedidoId = {$pedidoId};";
        $resultado = self::CONEXION->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    function insertarDatos(): bool
    {
        $sql = "INSERT INTO pedidos (productoId, clienteId, fecha, precio, descripcion) VALUES ('{$this->productoId}','{$this->clienteId}','{$this->fecha}','{$this->precio}','{$this->descripcion}');";
        return (self::CONEXION->query($sql)) ? true : false;
    }

    function actualizarDatos(int $pedidoId, int $newProductoId, int $newClienteId, string $newFecha, float $newPrecio, string $newDescripcion): bool
    {
        $this->setProductoId($newProductoId)->setClienteId($newClienteId)->setFecha($newFecha)->setPrecio($newPrecio)->setDescripcion($newDescripcion);
        $sql = "UPDATE pedidos SET productoId= {$this->productoId},clienteId= {$this->clienteId},fecha= '{$this->fecha}',precio= {$this->precio},descripcion= '{$this->descripcion}' WHERE pedidoId= {$pedidoId};";
        return (self::CONEXION->query($sql)) ? true : false;
    }

    function eliminarDatos(int $pedidoId): bool
    {
        $sql = "DELETE  FROM pedidos WHERE pedidoId={$pedidoId};";
        return (self::CONEXION->query($sql)) ? true : false;
    }

    static function getAll() {
        $sql = "SELECT * FROM pedidos ORDER BY fecha ASC;";
        $conexion = conexion();
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    function getProductoId() : int {
        return $this->productoId;
    }

    function getClienteId() : int {
        return $this->productoId;
    }
    function getFecha() : string {
        return $this->productoId;
    }

    function getPrecio() : float {
        return $this->productoId;
    }

    function getDescripcion() : string {
        return $this->productoId;
    }

    function setProductoId(int $newProductoId): object
    {
        $this->productoId = $newProductoId;
        return $this;
    }
    function setClienteId(int $newClienteId): object
    {
        $this->clienteId = $newClienteId;
        return $this;
    }

    function setFecha(string $newFecha): object
    {
        $this->fecha = $newFecha;
        return $this;
    }
    
    function setPrecio(float $newPrecio): object
    {
        $this->precio = $newPrecio;
        return $this;
    }

    function setDescripcion(string $newDescripcion): object
    {
        $this->descripcion = $newDescripcion;
        return $this;
    }
}
