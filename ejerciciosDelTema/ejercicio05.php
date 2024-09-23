<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <h1>Ampliación ejercicio 04</h1>
<?php
$nota1 = rand(0, 10);
$nota2 = rand(0, 10);
$nota3 = rand(0, 10);

echo "<p>", $nota1, "<br>", $nota2, "<br>", $nota3, "</p>";

$mayor = 0;
//$min = 0;
/*
esto es una prueba que estaba haciendo
$mayor = max($nota1, $nota2, $nota3); #así es más rapido
$min = min($nota1, $nota2, $nota3); #así es más rapido
*/

if ($nota1 > $nota2  && $nota1 > $nota3) {
    $mayor = $nota1;
} elseif ($nota2 > $nota1  && $nota2 > $nota3) {
    $mayor = $nota2;
} else {
    $mayor = $nota3;
}

if ($mayor < 5) {
    echo "has suspendido";
}  elseif ($mayor < 6) {
    echo "haz aprobado por los pelos";
}  elseif ($mayor < 8) {
    echo "haz aprobado, bien hecho";
}  elseif ($mayor <= 10) {
    echo "haz sacado un excelente";
} else{
    echo "Error en la nota.";
}

echo  "<p> La nota mayor es: $mayor </p>";
//echo  "<p> La nota menor es: $min </p>";

//parte ampliada del ejercicio 05

switch ($mayor) {
    case ($mayor < 5):
        echo "has suspendido";
        break;
    case ($mayor < 6):
        echo "haz aprobado por los pelos";
        break;
    case ($mayor < 8):
        echo "haz aprobado, bien hecho";
        break;
    case ($mayor <= 10):
        echo "haz sacado un excelente";
        break;
    default:
        echo "Nota incorrecta.";
        break;
}
?>
</body>
</html>
