<?php
include_once '../views/layouts/cabecera.php';
?>

<main>
    <?php include_once '../views/layouts/layoutsProduct/listProducts.php' ?>
    <?php include_once '../views/layouts/layoutsProduct/updateFormProduct.php' ?>
    <?php include_once '../views/layouts/layoutsProduct/insertFormProduct.php' ?>
    <?php include_once '../views/layouts/layoutsProduct/deleteFormProduct.php' ?>

    <div class="option">
        <button onclick="window.location.href='../controllers/controller.php?option=exit'">Cerrar Sesión</button>
    </div>
</main>


<?php
include_once '../views/layouts/pie.php';
//var_dump($depure);
?>


<script src="../../public/js/script.js"></script>