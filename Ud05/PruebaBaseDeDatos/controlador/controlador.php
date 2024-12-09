<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//include '../modelo/modelo.php';
include '../modelo/Cliente.php';
include '../modelo/Producto.php';
include '../modelo/Pedidos.php';

//Ud05/PruebaBaseDeDatos/modelo/modelo.php

/** 
 * Terminos
 * T1 = Clientes
 * T2 = Pedidos
 * T3 = Productos
 *
 * A1 = Listar Datos
 * A2 = Insertar Datos
 * A3 = Actualizar Datos
 * A4 = Eliminar Datos
 */

if ($_POST) { // Si el formulario ha sido enviado
    $opcionTabla = $_POST['opcionTablaHidden'];
    $opcionAccion = $_POST['opcionAccionHidden'];

    switch ($opcionAccion) {
        case "A1":
            listarDatos($opcionTabla);
            break;
        case "A2":
            insertarDatos($opcionTabla);
            //header('location: ../vista/vista.php');
            break;
        case "A3":
            actualizarDatos($opcionTabla);
            break;
        case "A4":
            eliminarDatos($opcionTabla);
            break;
    }
}

function listarDatos($opcionTabla)
{
    switch ($opcionTabla) {
        case 'T1':
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}

function insertarDatos($opcionTabla): void
{
    switch ($opcionTabla) {
        case 'T1':
            if (isset($_POST['nombreCliente']) && isset($_POST['apellidosCliente'])) {
                $nombreCliente = $_POST['nombreCliente'];
                $apellidosCliente = $_POST['apellidosCliente'];
                $cliente = new Cliente($_POST['nombreCliente'], $_POST['apellidosCliente']);
                $resultado = $cliente->insertarDatos();
                header('location: ../vista/vista.php?ok=' . $resultado);
            }
            break;
        case 'T2':
            if (
                isset($_POST['idPedido']) && isset($_POST['idProducto'])
                && isset($_POST['idCliente']) && isset($_POST['fecha'])
                && isset($_POST['precio']) && isset($_POST['descripcio'])
            ) {
                $pedido = new Pedido();
                $cliente = new Cliente($_POST['nombreCliente'], $_POST['apellidosCliente']);
                $resultado = $cliente->insertarDatos();
                header('location: ../vista/vista.php?ok=' . $resultado);
            }
            break;
        case 'T3':
            if (isset($_POST['nombreCliente']) && isset($_POST['apellidosCliente'])) {
                $cliente = new Cliente($_POST['nombreCliente'], $_POST['apellidosCliente']);
                $resultado = $cliente->insertarDatos();
                header('location: ../vista/vista.php?ok=' . $resultado);
            }
            break;
    }
}

function actualizarDatos($opcionTabla)
{
    switch ($opcionTabla) {
        case 'T1':
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}

function eliminarDatos($opcionTabla)
{
    switch ($opcionTabla) {
        case 'T1':
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}


function depurar($Text): void
{
    echo '<p>' . $Text . '</p>';
}
