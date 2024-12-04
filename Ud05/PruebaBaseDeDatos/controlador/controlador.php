<?php
session_start();
include '../modelo/modelo.php';

/** Terminos
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

    switch ($opcionesAccion) {
        case "A1":
            listarDatos($opcionTabla);
            break;
        case "A2":
            insertarDatos($tabla);
            break;
        case "A3":
            actualizarDatos();
            break;
        case "A4":
            eliminarDatos();
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

function insertarDatos($opcionTabla) {
    switch ($opcionTabla) {
        case 'T1':
            if (isset($_POST['nombreCliente']) && isset($_POST['apellidosClientes'])) {
                $nombreCliente = $_POST['nombreCliente'];
                $
            } else {
                # code...
            }
            
            insertarCliente();
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}

function actualizarDatos($opcionTabla) {
    switch ($opcionTabla) {
        case 'T1':
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}

function eliminarDatos($opcionTabla) {
    switch ($opcionTabla) {
        case 'T1':
            break;
        case 'T2':
            break;
        case 'T3':
            break;
    }
}
