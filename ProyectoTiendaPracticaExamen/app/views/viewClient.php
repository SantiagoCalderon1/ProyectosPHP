<?php
include_once '../views/layouts/cabecera.php';
?>

<main>
    <?php include_once '../views/layouts/layoutsClient/listClients.php' ?>
    <?php include_once '../views/layouts/layoutsClient/updateFormClient.php' ?>
    <button onclick="submitForm()" id="btn-insert">INSERTAR</button>

    <button onclick="submitForm()" id="btn-delete">ELIMINAR</button>


    <div class="option">
        <button onclick="window.location.href='../controllers/controller.php?option=exit'">Cerrar Sesión</button>
    </div>
</main>

<?php
include_once '../views/layouts/pie.php';
?>

<script src="../../public/js/script.js"></script>