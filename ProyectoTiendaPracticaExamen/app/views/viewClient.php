<?php
include_once '../views/layouts/cabecera.php';
?>

<main>
    <?php include_once '../views/layouts/layoutsClient/listClients.php' ?>
    <?php include_once '../views/layouts/layoutsClient/updateDropdownClient.php' ?>
    
    <div class="option">
        <button onclick="window.location.href='../controllers/controller.php?option=exit'">Cerrar Sesión</button>
    </div>
</main>

<?php
include_once '../views/layouts/pie.php';
?>