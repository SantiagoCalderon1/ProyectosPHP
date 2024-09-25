<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <!--Santiago Calderon Castaño-->

</head>

<body>
    <h1>Ejercicio 4</h1>
    <?php

    function  calcularPrecio($precio, $descuento = 0)
    {
        return  $precio - ($precio * $descuento / 100);
    }

    /*  
    function imprimirDatos($precio, $descuento){
        echo "<p>El precio  es : $precio <br>
                 El descuento es: $descuento% <br>
                 El precio con el descuento es: ".calcularPrecio($precio, $descuento)."</p>";
    }
    imprimirDatos(250, 10);
    imprimirDatos(85,$descuento);
     */
    $precio1 = 250;
    $descuento1 = 10;

    $precio2 = 85;
    $descuento2 = 0;

    echo "<p>El precio  es : $precio1 <br>
                 El descuento es: $descuento1% <br>
                 El precio con el descuento es: " . calcularPrecio($precio1,  $descuento1) . "</p>";

    echo "<p>El precio  es : $precio2 <br>
                 El descuento es: " . ($descuento2 === 0 ?  "No hay descuento" : $descuento2 . "%") . " <br>
                 El precio con el descuento es: " . calcularPrecio($precio2) . "</p>";
    ?>
</body>

</html>