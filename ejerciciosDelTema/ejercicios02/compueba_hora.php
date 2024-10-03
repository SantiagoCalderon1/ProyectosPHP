<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 02-08</h1>

    <?php
    $hora = "21:67:12";

    comprobarHora($hora);

    function horaEsCorrecta($input)
    {
        $hora = explode(':', $input);

        if ($hora[0] >  23 || $hora[0] < 0 || $hora[1] > 60 || $hora[1] < 0 || $hora[2] > 60 ||  $hora[2] < 0) {
            return false;
        } else {
            return true;
        }
    }

    function comprobarHora($input)
    {
        if (horaEsCorrecta($input)) {
            echo "La hora $input es correcta";
        } else {
            echo "La Hora $input es incorrecta";
        }
    }

    ?>


</body>

</html>