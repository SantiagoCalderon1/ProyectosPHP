<?php


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
    <header>
        <h1>Proyecto de Aplicación Web CRUD - PHP</h1>
    </header>
    <main>
        <div id="opciones">
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
    <footer>
        <p>Hecho por Santiago Calderon</p>
    </footer>
</body>

</html>