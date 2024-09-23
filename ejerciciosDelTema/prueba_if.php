<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
    <!--Santiago Calderon Castaño-->

</head>

<body>
    <?php
    $nota1 = rand(1, 10);
    $nota2 = rand(1, 10);

    $mayor;

    if ($nota1 > $nota2) {
        $mayor = $nota1;
    } else {
        $mayor = $nota2;
    }

    echo  "La nota mayor es: $mayor";

    ?>
</body>

</html>