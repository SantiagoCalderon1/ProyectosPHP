<?php

function conexionEmpresa()  {
    $mysqli = new mysqli("127.0.0.1", "phpmyadmin", "1234", "empresa_db");
    if ($mysqli->connect_errno) {
        echo "Error." . $mysqli->connect_errno;
        exit;
    }
    return $mysqli;
}

function closeConexionEmpresa($conexion){
    $conexion->close();
}