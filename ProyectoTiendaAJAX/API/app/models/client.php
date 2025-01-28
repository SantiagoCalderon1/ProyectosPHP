<?php
include_once '../../config/ConexionTienda.php';

class client
{
    public function __construct(
        private string $clientName = '',
        private string $clientSurname = '',
        private string $clientId = ''
    ) {}

    static public function getAllData(string $clientId = ''): array
    {
        $conexion = null;
        try {
            $conexion = openConexionTienda();
            if (empty($clientId)) {
                $sql = "SELECT * FROM clientes;";
            } else {
                $sql = "SELECT * FROM clientes WHERE clienteId={$clientId};";
            }
            $result = $conexion->query($sql);
            if ($result->num_rows >= 1) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
            return [];
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "');</script>";
            return [];
        } finally {
            if ($conexion) {
                closeConexionTienda($conexion);
            }
        }
    }

    static public function insertClient(client $insertClient): bool
    {
        if (empty($insertClient)) {
            throw new InvalidArgumentException('Error insertando un cliente, verifique los datos.');
        }
        $conexion = null;
        try {
            $conexion = openConexionTienda();
            $sql = "INSERT INTO clientes (nombre, apellidos) VALUES ('{$insertClient->clientName}','{$insertClient->clientSurname}');";
            $conexion->query($sql);
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "')</script>";
            return false;
        } finally {
            if ($conexion) {
                closeConexionTienda($conexion);
            }
        }
    }

    static public function updateClient(string $clientId, array $atributos): bool
    {
        $conexion = null;
        try {
            $conexion = openConexionTienda();
            if (!empty($atributos)) {
                $sql = "UPDATE clientes SET " . implode(',', $atributos) . " WHERE clienteId=$clientId;";
                $result = $conexion->query($sql);
                return $result;
            }
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        } finally {
            if ($conexion) {
                closeConexionTienda($conexion);
            }
        }
    }

    static public function deleteClient(int $clientId): bool
    {
        if ($clientId < 0) {
            throw new InvalidArgumentException('El campo id cliente no puede ser negativo.');
        }
        $conexion = null;
        try {
            $conexion = openConexionTienda();
            //verificamos si el cliente ha hecho pedidos, y si es así no lo permitiremos eliminar 
            $numPedidos = $conexion->query("SELECT COUNT(*) FROM pedidos WHERE clienteId={$clientId};");
            if ($numPedidos->fetch_column() > 0) {
                throw new Exception('No se puede eliminar un cliente que tiene pedidos asociados.');
            }
            $sql = "DELETE FROM clientes WHERE clienteId={$clientId};";
            // no se podrá eliminar clietes que previamente hayan hecho un pedido, es para cuidar la consistencia de los datos
            return $conexion->query($sql);
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        } finally {
            if ($conexion) {
                closeConexionTienda($conexion);
            }
        }
    }
}
