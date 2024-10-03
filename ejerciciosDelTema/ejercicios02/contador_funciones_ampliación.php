<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
    <!--Santiago Calderon Castaño-->

</head>

<body>
    <h1>Ejercicio sobre funciones</h1>

    <form method="post">
        <label for="numero1">Primer numero: </label>
        <input type="text" id="numero1" name="numero1" required>
        <br><br>
        <label for="numero2">Segundo numero: </label>
        <input type="text" id="numero2" name="numero2" required>
        <br><br>
        <label for="numero3">Tercer numero: </label>
        <input type="text" id="numero3" name="numero3">
        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //accediendo al valor del input con $_POST
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $num3 = empty($_POST["numero3"]) ? 1 : $_POST["numero3"];
        //llamando a la función
        cuenta($num1, $num2, $num3);
    }
    ?>

    <p>
        <?php
        function cuenta($num1, $num2, $num3)
        {
            $menor = min($num1, $num2);
            $mayor = max($num1, $num2);


            if ($menor == $num1) {
                for ($i = $menor; $i <= $mayor; ($i += $num3)) {
                    echo htmlspecialchars($i);
                    if ($i != $mayor) {
                        echo  htmlspecialchars(" , ");
                    }
                }
            } else {
                for ($i = $mayor; $i >= $menor; ($i -= $num3)) {
                    echo htmlspecialchars($i);
                    if ($i != $menor) {
                        echo  htmlspecialchars(" , ");
                    }
                }
            }

            /**
             * se usa htmlspecialchars() para proteger el código de posibles ataques 
             * de inyección de HTML o XSS.
             * Que no pasará en mi caso, pero voy probando cosas
             */
        }
        ?>
    </p>
</body>

</html>