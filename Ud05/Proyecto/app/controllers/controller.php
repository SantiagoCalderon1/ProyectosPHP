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

if (isset($_POST['opcionesTabla']) && isset($_POST['opcionesAccion'])) {

    $opcionesTabla = $_POST['opcionesTabla'];

    switch ($opcionesTabla) {
        case 'T1':
            # code...
            break;
        case 'T2':
            # code...
            break;

        case 'T3':
            # code...
            break;
    }
} else {
}
