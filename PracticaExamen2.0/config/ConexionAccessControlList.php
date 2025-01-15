<?php

function OpenConexionACL()
{
    $conexion_mysqli = new mysqli('127.0.0.1', 'phpMyAdmin', '1234', 'ControlAccessList');
    if ($conexion_mysqli->connect_errno) {
        echo 'Error: ' . $conexion_mysqli->connect_errno;
        exit();
    }
    return $conexion_mysqli;
}

function closeConexionACL($conexion)
{
    $conexion->close();
}
