<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07</title>
</head>
<body>
    <h1>Ejercicio 07</h1>
    <?php 
    //Declaración de variables
    $ahora = time();
    $fecha = date("d M Y");
    $hora = date("H:i:s");

    echo "<h3>$fecha - $hora </h3>";

    ?>
</body>
</html>