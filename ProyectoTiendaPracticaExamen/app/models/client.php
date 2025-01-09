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

    static public function getAllData(): ?array
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

    public function insertClient(client $newUser): bool
    {
        if (empty($newUser)) {
            throw new InvalidArgumentException('Error insertando un cliente, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO clientes VALUES ('{$newUser->clientName}','{$newUser->clientSurname}');");
        closeConexionTienda($conexion);
        return $result;
    }

    public function updateClient(client $updateUser, int $clientId): bool
    {
        if (empty($updateUser)) {
            throw new InvalidArgumentException('Error insertando un cliente, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("UPDATE clientes SET nombre='{$updateUser->clientName}', apellido='{$updateUser->clientSurname}' WHERE clienteId={$clientId};");
        closeConexionTienda($conexion);
        return $result;
    }

    public function deleteClient(int $clientId): bool
    {
        if ($clientId < 0) {
            throw new InvalidArgumentException('El campo id cliente no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        // no se podrá eliminar clietes que previamente hayan hecho un pedido, es para cuidar la consistencia de los datos
        $result = $conexion->query("DELETE FROM clientes WHERE clienteId={$clientId};"); 
        closeConexionTienda($conexion);
        return $result;
    }

    public function selectClient(int $clientId) : ?array {
        if ($clientId < 0) {
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
