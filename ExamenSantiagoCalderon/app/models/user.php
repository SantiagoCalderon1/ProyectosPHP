<?php
session_start();
include_once '../../config/conexionEmpresa.php';

class user
{
    public function __construct() {}

    static function checkUser(string $username, string $password) : ?array
    {
        try {
            $conexion = conexionEmpresa();
            $result = $conexion->query("SELECT * FROM users WHERE username='{$username}' and password={$password};");
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        } catch (Exception $e) {
            echo "<script>console.log('Error iniciando sesion.');</script>";
        }finally{
            conexionEmpresa($conexion);
        }
        return false;
    }
}
