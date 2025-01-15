<?php 
include_once '../../config/ConexionAccessControlList.php';

class user{
    //public function __construct() {}

    static public function checkLogin($username, $password) {
        $conexion = openConexionACL();
        $result = $conexion->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}';");
        closeConexionACL($conexion);
        return $result;
    }
}