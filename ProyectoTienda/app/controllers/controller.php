<?php

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

if (isset($_POST['opcionesTabla'])) {

    $opcionesTabla = $_POST['opcionesTabla'];
    switch ($opcionesTabla) {
        case 'T1':
            header('location: clienteController.php');
            break;
        case 'T2':
            header('location: pedidoController.php');
            break;
        case 'T3':
            header('location: productoController.php');
            break;
    }
} else {
    # Code
}
