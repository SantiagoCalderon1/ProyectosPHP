<?php


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .ocultar {
        display: none !important;
    }

    body {
        width: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
        flex-direction: column;
    }

    #formConfiguracion {
        background-color: gray;
        color: white;

        font-size: 20px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        width: 400px;
        height: 25vh;

        margin: 20px 0;

        border-radius: 20px;
    }

    #formConfiguracion #btns {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px
    }

    #formConfiguracion label,
    #formConfiguracion select,
    #formConfiguracion input {
        margin: 5px 0;
    }

    #formDatos {
        background-color: gray;

        color: white;

        font-size: 20px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        width: 400px;
        margin: 20px 0;

        border-radius: 20px;
        padding: 20px 0;
    }

    #camposCliente,
    #camposPedido,
    #camposProducto {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2.5px;
    }

    #campoEnviar {
        margin: 10px;
    }
</style>

<body>
    <div id="opciones">
        <form action="" method="post" id="formConfiguracion">
            <label for="opcionesTabla">Opciones de tablas:</label>
            <select name="opcionesTabla" id="opcionesTabla">
                <option value="T1">Cliente</option>
                <option value="T2">Pedido</option>
                <option value="T3">Producto</option>
            </select>
            <label for="opcionesAccion">Que acción</label>
            <select name="opcionesAccion" id="opcionesAccion">
                <option value="A1">Listar Datos</option>
                <option value="A2">Insertar Datos</option>
                <option value="A3">Actualizar Datos</option>
                <option value="A3">Eliminar Datos</option>
            </select>
            <div id="btns">
                <input type="submit" value="Aceptar">
                <input type="submit" value="Cancelar">
            </div>
        </form>
    </div>

    <form action="../controlador/controlador.php" method="post" class="ocultar" id="formDatos">
        <input type="hidden" name="opcionTablaHidden" id="opcionTablaHidden">
        <input type="hidden" name="opcionAccionHidden" id="opcionAccionHidden">

        <div id="camposCliente" class="ocultar">
            <input type="hidden" name="">
            <label for="clienteId">Id Cliente:</label>
            <input type="text" name="clienteId">
            <label for="nombreCliente">Nombre:</label>
            <input type="text" name="nombreCliente">
            <label for="apellidosCliente">Apellidos:</label>
            <input type="text" name="apellidosCliente">
        </div>

        <div id="camposPedido" class="ocultar">
            <label for="pedidoId">Id Pedido:</label>
            <input type="text" name="pedidoId">
            <label for="productoId">Id Producto:</label>
            <input type="text" name="producto">
            <label for="idCliente">Id Cliente:</label>
            <input type="text" name="idCliente">

            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha">
            <label for="precioPedido">Precio:</label>
            <input type="number" name="precioPedido" min="0">
            <label for="descripcio">Descripcion:</label>
            <textarea name="descripcio" cols="30" rows="10"></textarea>
        </div>

        <div id="camposProducto" class="ocultar">
            <label for="productoId">Id:</label>
            <input type="text" name="productoId">
            <label for="nombreProducto">Nombre:</label>
            <input type="text" name="nombreProducto">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad">
            <label for="precioProducto">Precio:</label>
            <input type="number" name="precioProducto" min="0">
        </div>

        <div id="campoEnviar" class="">
            <input type="submit" value="Aceptar">
        </div>
    </form>

    <div id="notificaciones">
        <?php
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case '1':
                    echo '';
                    break;
            }
        }

        if (isset($_GET['ok'])) {
            if ($_GET['ok'] == 'true') {
                echo '<p>¡Todo salió bien!</p>';
            } else {
                echo '<p>¡Ups ha ocurrido un error!</p>';
            }
        }
        ?>
    </div>
    <script src="../controlador/scrip.js"></script>
</body>

</html>