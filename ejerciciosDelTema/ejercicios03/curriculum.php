<!--Santiago Calderon Castaño-->
<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum</title>
    <!-- Un poquito de estilos -->
    <style>
        body {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            color: #2c3e50;
        }
        p {
            color: #34495e;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    // Datos en español
    $lang = "es"; // Definimos el idioma actual a español
    $nombre_es = "Santiago Calderon Castaño";
    $estudios_es = "Ingeniería en Informática, Universidad Nacional Autónoma de Medellín.";
    $idiomas_es = "Español (Nativo), Inglés (Avanzado)";

    // Datos en inglés
    $nombre_en = "Santiago Calderon Castaño";
    $estudios_en = "Bachelor's Degree in Computer Engineering, National Autonomous University of Medellín.";
    $idiomas_en = "Spanish (Native), English (Advanced)";

    // Uso de variables variables para mostrar los datos dependiendo del idioma
    $nombre_var = "nombre_$lang";
    $estudios_var = "estudios_$lang";
    $idiomas_var = "idiomas_$lang";
    ?>

    <h1>Currículum de <?php echo $$nombre_var; // Uso de variables variables ?></h1>
    <div class="section">
        <h2>Estudios</h2>
        <p><?php echo $$estudios_var; // Uso de variables variables ?></p>
    </div>
    <div class="section">
        <h2>Idiomas</h2>
        <p><?php echo $$idiomas_var; // Uso de variables variables ?></p>
    </div>

    <!--Saca una linea para separar cosas-->
    <hr> 

    <?php
    // Cambiarnos el idioma a inglés
    $lang = "en"; // Ahora se muestran los datos en inglés

    // Actualizamos las variables variables
    $nombre_var = "nombre_$lang";
    $estudios_var = "estudios_$lang";
    $idiomas_var = "idiomas_$lang";
    ?>
    <h1>Curriculum of <?php echo $$nombre_var; // Uso de variables variables ?></h1>
    <div class="section">
        <h2>Studies</h2>
        <p><?php echo $$estudios_var; // Uso de variables variables ?></p>
    </div>
    <div class="section">
        <h2>Languages</h2>
        <p><?php echo $$idiomas_var; // Uso de variables variables ?></p>
    </div>
</body>
</html>