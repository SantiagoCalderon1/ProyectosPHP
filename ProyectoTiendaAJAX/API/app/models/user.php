<?php
include_once '../../config/ConexionAccessControlList.php';
class user
{
    public function __construct() {}

    static function checkLogin($username, $password)
    {
        $conexion = openConexionACL() ;
        $result = $conexion->query("SELECT * FROM Users WHERE username='{$username}' and password='{$password}';");
        if ($result->num_rows == 1) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            //closeConexionACL($conexion);
            //return true;
            return $data;
        } else {
            //return false;
            //closeConexionACL($conexion);
            return null;
        }
    }
}
