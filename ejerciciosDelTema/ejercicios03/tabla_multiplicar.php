<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 03-01</h1>

    <?php
    $tablaMultiplicar = [[], []];

    function rellenarTabla($filas, $columnas)
    {
        for ($f = 0; $f <= $filas; $f++) {
            for ($c = 0; $c <= $columnas; $c++) {
                $tablaMultiplicar[$f][$c] =  $f * $c;
            }
        }
        mostrarTabla($tablaMultiplicar);
    }

    function mostrarTabla($tablaMultiplicar)
    {
        for ($i = 0; $i <= count($tablaMultiplicar) - 1; $i++) {
            echo "Tabla del $i: <br>";
            for ($j = 0; $j <= count($tablaMultiplicar[$i]) - 1; $j++) {
                echo $i . " x " . $j . " = " . $tablaMultiplicar[$i][$j] . "<br>";
            }
        }
    }

    rellenarTabla(10, 10);


    ?>
</body>

</html>