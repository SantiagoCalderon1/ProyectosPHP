<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06</title>
    <!--Santiago Calderon Castaño-->
</head>

<body>
    <h1>Operaciones con cadenas</h1>
    <?php
    define('PI', 3.14159265358979323846);

    echo "<p>El valor de PI: " . PI . "</p>";

    $radio = 3.5;
    echo "<p>El valor de radio es: $radio</p>";

    $area = PI * pow($radio, 2);
    echo "<p>El vlaor del área es: $area</p>";

    $textoResultado = "El área calculada del círculo es: ". number_format($area, 2);
    echo "<p>El texto del resultado es: $textoResultado</p>";

    $textoResultadoMayus = strtoupper($textoResultado);
    echo "<p>El  texto del resultado en mayusculas es: $textoResultadoMayus</p>";

    $textoResultadoModificado = str_replace("calculada", "obtenida", $textoResultado);
    echo "<p>El texto del resultado modificado es: $textoResultadoModificado</p>";

    $longTextoModificado = strlen($textoResultadoModificado);
    echo "<p>La longitud del texto modificado es: $longTextoModificado</p>";

    $posPalabra = strpos($textoResultadoModificado, "círculo");
    echo "<p>La posicion de la palabra círculo es: $posPalabra</p>";

    $numeros = "1,2,3,4,5";
    echo "<p>El array de números es: $numeros</p>";

    $numeros = explode(',', $numeros);
    //aquí el explode no esta modificando el array solo lo imprime

    echo "<p>El array modificado con implode es: ".implode('',$numeros)."</p>";

    echo "<p>El array modificado con implode es: " . implode("+", $numeros) . "</p>";
                        //aquí el implode no esta modificando el array solo lo imprime

    $sumaNumeros =  array_sum($numeros);
    echo "<p>La suma del array es: $sumaNumeros</p> ";
    ?>
</body>

</html>