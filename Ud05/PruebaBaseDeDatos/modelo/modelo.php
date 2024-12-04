<?php
session_start();

include 'conexion.php';

$conexion = conexion();

//cliente

function listarCliente() {}

function insertarCliente($nombreCliente, $apellidoscliente)
{
    $sql = 'INSERT INTO cliente VALUES (' . $nombreCliente . ',' . $apellidoscliente . ')';
    if (conexion()->query($sql)) {
        echo '<p>Cliente insertado con éxito</p>';
    } else {
        echo '<p>Error al insertar cliente</p>';
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
