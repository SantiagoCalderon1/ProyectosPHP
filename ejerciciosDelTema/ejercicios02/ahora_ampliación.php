<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 07</title>
</head>

<body>
    <h1>Ejercicio 07 - ampliación</h1>

    <form method="post">
        <label for="fecha-nacimiento">Fecha de nacimiento: </label>
        <input type="text" name="fecha-nacimiento" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    //Esto lo reciclé de otro ejercicio
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //aquí accedemos al valor del input con $_POST
        $fechaNacimiento = $_POST["fecha-nacimiento"];
        cuantosAñosMesesDiasTengo($fechaNacimiento);
    }


    function cuantosAñosMesesDiasTengo($fechaNacimiento)
    {
        //dd/mm/aaaa  ->   aaaa/mm/dd
        $fechaNacimiento = explode('/',  $fechaNacimiento);

        // Verificamos que la fecha sea válida
        if (comprobarFecha($fechaNacimiento)) {
            // Creamos el objeto fechaNacimiento tipo DateTime, que antes era un array.
            $fechaNacimiento = new DateTime($fechaNacimiento[2] . '-' . $fechaNacimiento[1] . '-' . $fechaNacimiento[0]);
            //  Creamos el objeto fechaActual tipo DateTime, que es la fecha actual.
            $fechaActual = new DateTime();

            /* Restamos la fecha de nacimiento de la fecha actual para obtener la diferencia.
            Con el metodo diff() el resultado es un objeto DateTimeInterval que contiene la diferencia entre las dos fechas.
            separadas por años, meses, días, horas, minutos y segundos. */
            $diferencia = $fechaActual->diff($fechaNacimiento);

            // Obtenemos la diferencia en segundos entre las dos fechas.
            $segundosVida = $fechaActual->getTimestamp() - $fechaNacimiento->getTimestamp();

            // Aquí extraemos del objeto DateTimeInterval cantidad en años, meses, días, etc.
            $anyos = $diferencia->y;
            $meses = $diferencia->m;
            $dias = $diferencia->d;
            $horas = $diferencia->h;
            $segundos = $diferencia->s;

            /*
            Investigando el operador -> tiene varias funciones como para acceder a métodos y propiedades de objetos.
            Permite llamar funciones de un objeto o acceder a sus atributos de manera sencilla.
            Yo lo usé para calcular la diferencia de tiempo entre dos fechas y para descomponer esa diferencia en varios componentes (años, meses, días, horas y segundos)
            */

            // $anyos =  floor($segundosVida / 31536000);
            // $meses = floor(($segundosVida % 31536000) / 2629746);
            // $dias = floor(($segundosVida % 2629746) / 86400);

            echo "Tienes " . $segundosVida . " segundos de vida<br>";
            echo "Que es un total de " . $anyos . " años, " . $meses . " meses," . $dias . " días," . $horas . " horas, " . $segundos . " segundos.";
        } else {
            echo "La fecha de nacimiento no es válida.";
        }
    }

    function comprobarFecha($fechaNacimiento)
    {
        $anyoActual = date("Y");
        if (
            $fechaNacimiento[0]  < 1 || $fechaNacimiento[0] > 12 &&
            $fechaNacimiento[1]  < 1 || $fechaNacimiento[1] > 31 &&
            $fechaNacimiento[2]  < 1970 || $fechaNacimiento[2] > $anyoActual
        ) {
            return false; // la fecha no sería correcta ya que no está en el rango
        } else {
            //Verificamos  que la fecha sea correcta en formato
            return checkdate($fechaNacimiento[1], $fechaNacimiento[0], $fechaNacimiento[2]);
        }
    }
    ?>
</body>

</html>