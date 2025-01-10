<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Proyecto PHP</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="header-index">
            <h1>Practica Proyecto PHP</h1>
        </div>
    </header>
    <main>
        <?php
        include_once '../app/views/layouts/formAccess.php';

        if (isset($_GET['authenticationError']) && $_GET['authenticationError'] == 1) {
            echo '<h2>Credenciales incorrrecta, por favor vuelve a intentarlo.</h2>';
        }

        if (isset($_GET['closedSession']) && $_GET['closedSession'] == 1) {
            echo '<h2>Sesión cerrada correctamente.</h2>';
        }
        ?>

        <?php
        if (isset($_GET['forgotPassword']) && $_GET['forgotPassword'] == 1) {
            echo '<h2>Esto aún no funciona.</h2>';
        }
        ?>
    </main>
    <?php
    include_once '../app/views/layouts/pie.php';
    ?>
</body>

</html>