<?php
include '../app/models/Cliente.php';

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
if (isset($_GET['Option'])) {
    echo $_GET['Option'];
    switch ($_GET['Option']) {
        case 'A1':
            
            header('location: ../views/clientes/clienteListar.php');
            break;
        case 'A2':
            header('location: /views/clientes/clienteInsertar.php');
            break;
        case 'A3':
            header('location: /views/clientes/clienteEditar.php');
            break;
        case 'A4':
            header('location: /views/clientes/clienteEliminar.php');
            break;
    }
}

//A1 Esta variable la usaré en la vista
$clientes = Cliente::getAll();
    

//A2

//A3

//A4
