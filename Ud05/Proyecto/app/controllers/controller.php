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
    $opcionesAccion = $_POST['opcionesAccion'];

    switch ($opcionesTabla) {
        case 'T1':
            header('location: ../controllers/clienteController.php?Option='.$opcionesAccion);
            break;
        case 'T2':
            header('location: ../controllers/pedidoController.php?Option='.$opcionesAccion);
            break;
        case 'T3':
            header('location: ../controllers/productoController.php?Option='.$opcionesAccion);
            break;
    }
} else {
    # Code
}
