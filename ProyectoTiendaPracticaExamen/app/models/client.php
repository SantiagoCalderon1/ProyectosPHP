<?php
include_once '../../config/ConexionTienda.php';

class client
{
    public function __construct(
        private int $clientId = 0,
        private string $clientName = '',
        private string $clientSurname = ''
    ) {
        //$this->var = $var;
    }

    static public function getAllData($orderBy = 'clienteId'): ?array
    {
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM clientes ORDER BY {$orderBy} ASC;");
        if ($result->num_rows >= 1) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        } else {
            closeConexionTienda($conexion);
            return null;
        }
    }

    static public function insertClient(client $insertClient): bool
    {
        if (empty($updateClient)) {
            throw new InvalidArgumentException('Error insertando un cliente, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO clientes VALUES ('{$insertClient->clientName}','{$insertClient->clientSurname}');");
        closeConexionTienda($conexion);
        return $result;
    }

    static public function updateClient(client $updateClient): bool
    {
        if (empty($updateClient)) {
            throw new InvalidArgumentException('Error insertando un cliente, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("UPDATE clientes SET nombre='{$updateClient->clientName}', apellidos='{$updateClient->clientSurname}' WHERE clienteId={$updateClient->clientId};");
        closeConexionTienda($conexion);
        return $result;
    }

    // public function updateClient(): bool
    // {
    //     $conexion = openConexionTienda();
    //     $result = $conexion->query("UPDATE clientes SET nombre='{$this->clientName}', apellidos='{$this->clientSurname}' WHERE clienteId={$this->clientId};");
    //     closeConexionTienda($conexion);
    //     return $result;
    // }

    static public function deleteClient(int $clientId): bool
    {
        if ($clientId < 0) {
            throw new InvalidArgumentException('El campo id cliente no puede ser negativo.');
        }
        try {
            $conexion = openConexionTienda();
            //verificamos si el cliente ha hecho pedidos, y si es así no lo permitiremos eliminar 
            $numPedidos = $conexion->query("SELECT COUNT(*) FROM pedidos WHERE clienteId={$clientId};");
            if ($numPedidos->fetch_column() > 0) {
                throw new Exception('No se puede eliminar un cliente que tiene pedidos asociados.');
            }
            // no se podrá eliminar clietes que previamente hayan hecho un pedido, es para cuidar la consistencia de los datos
            $result = $conexion->query("DELETE FROM clientes WHERE clienteId={$clientId};");
            return $result;
        } catch (Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error.
            error_log("Error: " . $e->getMessage());
            return false;
        } finally {
            //siempre cerraremos la conexion
            closeConexionTienda($conexion);
        }
    }

    static public function selectClient(int $clientId): ?array
    {
        if ($clientId < 0) {
            throw new InvalidArgumentException('El campo Id cliente no puede estar vacío.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM clientes WHERE clienteId='{$clientId}';");
        if ($result->num_rows == 1) {
            $data = $result->fetch_row(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        } else {
            closeConexionTienda($conexion);
            return null;
        }
    }
}
