<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Examen</title>
</head>
<body>
    <?php include_once '../app/views/layouts/formLogin.php'; ?>

    <div class="error">
        <?php if (isset($_GET['authenticationError']) and $_GET['authenticationError'] == 1 ) {
            echo '<h2>Error en las credenciales.</h2>';
        }?>
    </div>
</body>
</html>