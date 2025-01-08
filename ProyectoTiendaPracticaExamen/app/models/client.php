<?php
include '../../config/ConexionTienda.php';

class client
{

    public function __construct(
        int $clientId = 0,
        string $clientName = '',
        string $clientSurname = ''
    ) {
        //$this->var = $var;
    }

    static public function getAllData(): array
    {
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM clientes ORDER BY clienteId ASC;");
        if ($result->num_rows >= 1) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        } else {
            closeConexionTienda($conexion);
            return null;
        }
    }

    public function insertNewClient(string $newUserName, string $newUserSurname): bool
    {
        if (empty($newNameUser) && empty($newSurnameUser)) {
            throw new InvalidArgumentException('Los campos nombre y aperllido no pueden estar vacios.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO clientes VALUES ('{$newUserName}','{$newUserSurname}');");
        closeConexionTienda($conexion);
        return $result;
    }

    public function updateClient(int $clientId, string $newNameUser, string $newSurnameUser = ''): bool
    {
        if (empty($newNameUser) && empty($newSurnameUser)) {
            throw new InvalidArgumentException('Los campos nombre y apellido no pueden estar vacios.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("UPDATE clientes SET nombre='{$newNameUser}', apellido='{$newSurnameUser}' WHERE clienteId={$clientId};");
        closeConexionTienda($conexion);
        return $result;
    }

    public function deleteClient(int $clientId): bool
    {
        if (empty($clientId)) {
            throw new InvalidArgumentException('El campo id cliente no puede estar vacío.');
        }
        $conexion = openConexionTienda();
        // no se podrá eliminar clietes que previamente hayan hecho un pedido, es para cuidar la consistencia de los datos
        $result = $conexion->query("DELETE FROM clientes WHERE clienteId={$clientId};"); 
        closeConexionTienda($conexion);
        return $result;
    }

    public function selectClient(int $clientId) : array {
        if (empty($clientId)) {
            throw new InvalidArgumentException('El campo Id cliente no puede estar vacío.');            
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM clientes WHERE clienteId='{$clientId}';");
        if ($result->num_rows == 1) {
            $data = $result->fetch_row(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        }else{
            closeConexionTienda($conexion);
            return null;
        }
    }
}
