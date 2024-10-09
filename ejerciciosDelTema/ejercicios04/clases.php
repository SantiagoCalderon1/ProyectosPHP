<?php 
// Incluir las clases
include_once 'clasePersona.php';
include_once 'claseEstudiante.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 04-01</title>
    <!--Santiago Calderon Castaño-->
</head>

<body>
    <h1>Ejercicio 04-01 sobre clases</h1>
    
    <?php
    // Creamos un objeto de cada tipo
    $persona = new Persona("12345678A", "Santiago Calderon", "santiago@papi.com");
    $estudiante = new Estudiante("87654321B", "Ramón Bilbao", "Ramon@buenvino.com", "EXP001");
    // Mostramos la información de cada objeto
    ?>
    <h2>Información de la Persona 1</h2>
    <p><?php echo $persona->mostrar(); //Llamamos a la función Mostrar() de Persona?></p>
    <h2>Información del Estudiante 1</h2>
    <p><?php echo $estudiante->mostrar(); //Llamamos a la función Mostrar() de Estudiante ?></p>

    <?php
    // Cambiando algún atributo usando setters
    $persona->__setEmail("nuevoSantiago@mipapi.com");
    $estudiante->__setNumExpediente("EXP002");
    ?>

    <h3>Información modificada de la Persona 1</h3>
    <p><?php echo $persona->mostrar(); ?></p>
    <h3>Información modificada del Estudiante 1</h3>
    <p><?php echo $estudiante->mostrar(); ?></p>
</body>
</html>