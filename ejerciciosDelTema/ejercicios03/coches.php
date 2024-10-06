<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03-02</title>
</head>

<body>
    <h1>Ejercicio 03-02</h1>
    <?php
    $coches = array(
        '111BCD' => array("Ford", "Focus", "5 puertas"),
        '222CDE' => array("Chevrolet", "Cruze", "Sedán"),
        '333DEF' => array("Toyota", "Corolla", "Hatchback"),
        '444EFG' => array("Honda", "Civic", "Coupé"),
        '555FGH' => array("Nissan", "Altima", "Sedán"),
        '666GHI' => array("Volkswagen", "Golf", "5 puertas"),
        '777HIJ' => array("Hyundai", "Elantra", "Sedán"),
        '888IJK' => array("Mazda", "3", "Hatchback"),
        '999JKL' => array("Kia", "Optima", "Sedán"),
        '101LMN' => array("Subaru", "Impreza", "Hatchback")
    );

    // así de ordena el array de forma ascendente, krsort() descendete
    ksort($coches);

    /*
    foreach ($coches as $coche) { así solamente se obtiene el contenido del array asociativo

    foreach ($coches as $coche => $valores) { así se obtiene la clave y valor 
    del array asociativo
    */

    foreach ($coches as $coche => $valores) {
        echo ("<p>Matricula: $coche, Marca: $valores[0], Modelo: $valores[1], Tipo: $valores[2]</p>");
    }

    // print_r($coches);

    ?>

</body>

</html>