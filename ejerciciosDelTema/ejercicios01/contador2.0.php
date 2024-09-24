<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07</title>
    <!--Santiago Calderon Castaño-->

</head>

<body>
    <h1>Ejercicio Contador.</h1>
    <h3>Contando de 1 a 100 usando un for</h3>
    <p>
        <?php
        #Números de 1 al 100 usando un for
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
        ?>
    </p>
    <h3>Contando de 10 a 0 usando un while</h3>
    <p>
        <?php

        #Números del 10 al 0 usando un while
        $contador = 10;

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
        ?>
    </p>
</body>

</html>