<?php
session_start();

include 'conexion.php';
include 'Cliente.php';
include 'Producto.php';
include 'Pedidos.php';


//cliente
function listarCliente() {}

function insertarCliente($nombreCliente, $apellidoscliente)
{
    $conexion = conexion();
    echo '<br>En insertar cliente del modelo<br>';
    $sql = 'INSERT INTO cliente (nombre,apellidos) VALUES (\'' . $nombreCliente . '\',\'' . $apellidoscliente . '\');';
    echo 'sql: ' . $sql;
    
    if ($conexion->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function actualizarCliente() {}

function eliminarCliente() {}

//Producto

function listarProducto() {}

function insertarProducto($nombreProducto, $cantidadProducto)
{
    $sql = 'INSERT INTO productos VALUES (' . $nombreProducto . ',' . $cantidadProducto . ')';
    if (conexion()->query($sql)) {
        echo '<p>Producto insertado con éxito</p>';
    } else {
        echo '<p>Error al insertar Producto</p>';
    }
}

function actualizarProducto() {}

function eliminarProducto() {}

//Pedido

function listarPedido() {}

function insertarPedido($idProducto, $idcliente, $fechaPedido, $precioPedido, $descripcionPedido)
{
    $sql = 'INSERT INTO pedido VALUES (' . $idProducto . ',' . $idcliente . ',' . $fechaPedido . ',' . $precioPedido . ',' . $descripcionPedido . ')';
    if (conexion()->query($sql)) {
        echo '<p>Producto insertado con éxito</p>';
    } else {
        echo '<p>Error al insertar Producto</p>';
    }
}

function actualizarPedido() {}

function eliminarPedido() {}
