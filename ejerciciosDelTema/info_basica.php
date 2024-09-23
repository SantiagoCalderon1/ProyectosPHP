<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
    <!--Santiago Calderon Castaño-->
</head>

<body>
    <h1>Página de prueba</h1>
    <?php
    $nombre = "Santiago Calderon";
    $anyo = 2003;
    ?>
    <p>Me llamo <?php echo $nombre; ?> y nací en el año <?php echo $anyo; ?>.</p>

    <p>Me llamo <?= $nombre; ?> y nací en el año <?= $anyo; ?>.</p>

    <p>Me llamo <?php print $nombre; ?> y nací en el año <?php print $anyo; ?>.</p>
</body>


</body>

</html>