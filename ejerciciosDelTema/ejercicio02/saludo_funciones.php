<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
    <!--Santiago Calderon Castaño-->

</head>

<body>
    <h1>Ejercicio sobre funciones</h1>

    <form method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //accediendo al valor del input con $_POST
        $nombre = $_POST["nombre"];
        //llamando a la función
        saludo($nombre);
    }

    function saludo($nombre)
    {
        echo "<p>Hola, Te llamas ", htmlspecialchars($nombre), "</p>";
        /**
         * se usa htmlspecialchars() para proteger el código de posibles ataques 
         * de inyección de HTML o XSS.
         * Que no pasará en mi caso, pero voy probando cosas
         */
    }
    ?>
</body>

</html>