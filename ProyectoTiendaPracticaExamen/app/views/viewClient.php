<?php
include '../views/layouts/cabecera.php';
?>

<main>
    <?php
    include '../views/layouts/listClients.php' ?>

    <div class="option">
        <button onclick="window.location.href='../controllers/controller.php?option=exit'">Cerrar Sesión</button>
    </div>
</main>

<?php
include '../views/layouts/pie.php';
?>