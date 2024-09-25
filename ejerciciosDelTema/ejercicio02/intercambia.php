<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <?php
    $a = 5;
    $b = 9;

    function intercambiarValores(&$a, &$b)
    {
        $aux = $a;
        $a = $b;
        $b = $aux;
    }

    function mostarValores($a, $b)
    {
        echo "<p>El valor de a es : $a \n  El valor de b es : $b</p>";

        intercambiarValores($a, $b);

        echo "<p>El valor de a ahora es : $a \n  El valor de b ahora es : $b</p>";
    }
    ?>
</body>

</html>