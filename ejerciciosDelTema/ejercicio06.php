<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06</title>
</head>

<body>
    <h1>Contador.</h1>
    <?php
    echo "<h3>Contando de 1 a 100 usando un for</h3>";
    #Números de 1 al 100 usando un for
    echo "<p>";
    for ($i = 1; $i <= 100; $i++) {
        if ($i != 100) {
            echo "$i, ";
        } else {
            echo "$i ";
        }

        /*
        Esta es la forma en la que paula lo hizo, 
        es buena ya que solo se imprime la i en un solo lugar.

        echo $i;
        if  ($i <= 100) {
            echo ", ";
        }
        */
    }
    echo "</p>";

    echo "<h3>Contando de 10 a 0 usando un while</h3>";
    #Números del 10 al 0 usando un while
    $contador = 10;

    echo "<p>";
    while ($contador >= 0) {
        if ($contador != 0) {
            echo "$contador- ";
        } else {
            echo "$contador ";
        }
        $contador--;

        /*
        echo $contador;
        if ($contado > 0){
            echo "- ";
        }
        */
    }
    echo "</p>";
    ?>
</body>

</html>