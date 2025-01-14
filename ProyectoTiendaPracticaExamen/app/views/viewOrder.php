<?php
include_once '../views/layouts/cabecera.php';
?>

<main>
<?php include_once '../views/layouts/layoutsOrder/listOrders.php' ?>
    <?php include_once '../views/layouts/layoutsOrder/updateFormOrder.php' ?>
    <?php include_once '../views/layouts/layoutsOrder/insertFormOrder.php' ?>
    <?php include_once '../views/layouts/layoutsOrder/deleteFormOrder.php' ?>

    <div class="option">
        <button onclick="window.location.href='../controllers/controller.php?option=exit'">Cerrar Sesión</button>
    </div>
</main>


<?php
include_once '../views/layouts/pie.php';
//var_dump($depure);
?>

<script src="../../public/js/script.js"></script>