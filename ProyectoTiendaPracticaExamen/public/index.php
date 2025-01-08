<?php
include_once '../app/views/layouts/cabecera.php';
?>

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
</main>

<?php
include_once '../app/views/layouts/pie.php';
?>