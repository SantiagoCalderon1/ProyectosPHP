<?php
include '../config/conexion.php';

class Cliente
{
    private $conexion;

    public function __construct(
        private String $nombre = '',
        private String $apellido = ''
    ) {
        $this->conexion = conexion();
    }

    function obtenerDatos($clienteId): array
    {
        $sql = "SELECT * FROM clientes WHERE clienteId = {$clienteId};";
        $resultado = $this->conexion->query($sql);
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }

    function insertarDatos(): bool
    {
        $sql = "INSERT INTO clientes (nombre,apellidos) VALUES ('{$this->nombre}','{$this->apellido}');";
        return ($this->conexion->query($sql)) ? true : false;
    }

    function actualizarDatos(int $clienteId, string $newNombre, string $newApellido): bool
    {
        $this->setNombre($newNombre)->setApellido($newApellido);
        $sql = "UPDATE clientes SET nombre= '{$this->nombre}',apellidos= '{$this->apellido}' WHERE clienteId= {$clienteId};";
        return ($this->conexion->query($sql)) ? true : false;
    }

    function eliminarDatos(int $clienteId): bool
    {
        $sql = "DELETE FROM clientes WHERE clienteId={$clienteId};";
        return ($this->conexion->query($sql)) ? true : false;
    }

    static function getAll() {
        $sql = "SELECT * FROM clientes ORDER BY nombre ASC;";
        $conexion = conexion();
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    function getNombre(): String
    {
        return $this->nombre;
    }

    function getApellido(): String
    {
        return $this->apellido;
    }

    function setNombre(string $newNombre): object
    {
        $this->nombre = $newNombre;
        return $this;
    }

    function setApellido(string $newApellido): object
    {
        $this->apellido = $newApellido;
        return $this;
    }
}
