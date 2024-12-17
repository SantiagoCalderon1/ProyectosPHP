<?php
include_once '../views/layouts/header.php';
include_once '../views/layouts/footer.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini APP-WEB</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php cabecera(1)?>
    <main>
        
        <div id="formBox">
            <form action="../app/controllers/controller.php" method="post" id="formConfiguracion">
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
    </main>
    <?php pie(1)?>
</body>

</html>