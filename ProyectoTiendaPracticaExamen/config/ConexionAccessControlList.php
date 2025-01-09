<?php

function openConexionACL() {
    //    $mysqli_conexion = new mysqli('127.0.0.1', 'phpMyAdmin', '1234', 'AccessControlList');

    $mysqli_conexion = new mysqli('127.0.0.1', 'phpmyadmin', '1234', 'AccessControlList');
    if ($mysqli_conexion->connect_errno) {
        echo 'Error en la conexión con la base de datos AccessControlList. ' ;//. $mysqli_conexion->connect_errno;
        exit;
    }
    return $mysqli_conexion;
}

function closeConexionACL($conexion) {
    $conexion->close();
}