<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07</title>
</head>
<body>
    <h1>Ejercicio 07 - ampliación</h1>

    <form  method="post">
        <label for="fecha-nacimiento">Fecha de nacimiento: </label>
        <input type="text" id="fecha-nacimiento" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //aquí accedemos al valor del input con $_POST
        $fechaNacimiento = $_POST["fecha-nacimiento"];
        cuantosAñosMesesDiasTengo($fechaNacimiento);
    }

    
    function cuantosAñosMesesDiasTengo(){
        
    }

    //Declaración de variables
    $ahora = time();
    $fecha = date("d M Y");
    $hora = date("H:i:s");

    echo "<h3>$fecha - $hora </h3>";

    ?>
</body>
</html>