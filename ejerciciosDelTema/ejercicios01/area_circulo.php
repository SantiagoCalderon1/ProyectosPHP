<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
    <!--Santiago Calderon Castaño-->

    <?php
    define('PI',  3.14159265358979323846);
    #const PI = 3.14159265358979323846;
    ?>
</head>

<body>
    <h1>Ejercicio 02</h1>

    <?php
    $radio = 3.5;
    $area = PI * pow($radio, 2);
    echo  "El área del círculo es: $area";
    ?>

</body>

</html>