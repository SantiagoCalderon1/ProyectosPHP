<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>
<body>
    <?php 
    echo '<h1>Hola, Bienvenido!!!</h1>';

    $accesosPagina = 0;
    if (isset($_COOKIE['accesos'])) { 
        $accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
        setcookie('accesos', ++$accesosPagina, time() + 20); // le asignamos un valor
        echo '<p>Has visitado esta página ' . $accesosPagina . ' veces.</p>';
    } 
    ?>
    
</body>
</html>