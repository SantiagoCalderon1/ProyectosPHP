<?php

function openConexionTienda() {
    $mysqli_conexion = new mysqli('127.0.0.1', 'phpMyAdmin', '1234', 'Tienda');
    if ($mysqli_conexion->connect_errno) {
        echo ' Error de conexion con la base de datos Tienda. '; //. $mysqli_conexion->connect_errno;
        exit;
    }
    return $mysqli_conexion;
}

function closeConexionTienda($conexion) {
    $conexion->close();
}