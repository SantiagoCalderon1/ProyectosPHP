<?php
function conexion()
{
    //parametro 1 (nombre del host), parametro 2 (nombre de usuario), parametro 3 (contraseña), parametro 4 (nombre
    $mysqli_conexion = new mysqli('127.0.0.1', 'phpMyAdmin', '1234', 'Tienda');
    if ($mysqli_conexion->connect_errno) {
        echo 'Error de conexión: ' . $mysqli_conexion->connect_errno;
        exit;
    }
    return $mysqli_conexion;
}

function cerrarConexion($conexion){
    $conexion->close();
}
