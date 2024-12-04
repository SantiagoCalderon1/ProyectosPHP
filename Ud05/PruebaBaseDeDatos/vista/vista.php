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
        display: none;

    }

    body {
        width: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
        flex-direction: column;
    }

    #formConfiguracion {
        background-color: red;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        width: 400px;
        height: 40vh;
    }

    #formConfiguracion label,
    #formConfiguracion select,
    #formConfiguracion input {
        margin: 5px 0;
    }

    #formDatos {
        background-color: green;
        display: flex;
        flex-direction: column;
        align-items: center;

        width: 400px;
        height: 20vh;
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

            <input type="submit" value="Aceptar">
            <input type="submit" value="Cancelar">
        </form>

    </div>

    <div id="listarDatos">

    </div>

    <div id="insertarDatos">

    </div>

    <div id="actualizarDatos">

    </div>

    <div id="EliminarDatos">

    </div>

    <form action="../controlador/controlador.php" method="post" class="ocultar" id="formDatos">
        <input type="hidden" name="opcionTablaHidden" id="opcionTablaHidden">
        <input type="hidden" name="opcionAccionHidden" id="opcionAccionHidden">

        <div id="camposCliente" class="ocultar">
            <input type="hidden" name="">
            <label for="idCliente">Id:</label>
            <input type="text" name="idCliente">
            <label for="nombreCliente">Nombre:</label>
            <input type="text" name="nombreCliente">
            <label for="apellidos">Apellidos:</label>
            <input type="apellidos" name="apellidosClientes">
        </div>

        <div id="camposProducto" class="ocultar">
            <label for="idProducto">Id:</label>
            <input type="text" name="idProducto">
            <label for="nombreProducto">Nombre:</label>
            <input type="text" name="nombreProducto">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad">
            <label for="precioProducto">Precio:</label>
            <input type="number" name="precioProducto" min="0">
        </div>

        <div id="camposPedido" class="ocultar">
            <label for="idPedido">Id Pedido:</label>
            <input type="text" name="idPedido">
            <label for="idProducto">Id Producto:</label>
            <input type="text" name="idProducto">
            <label for="idCliente">Id Cliente:</label>
            <input type="text" name="idCliente">

            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" min="0">
            <label for="descripcio">Descripcion:</label>
            <textarea name="descripcio" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" name="accion" value="Enviar">Enviar</button>
    </form>
    <script src="../controlador/scrip.js"></script>

</body>

</html>