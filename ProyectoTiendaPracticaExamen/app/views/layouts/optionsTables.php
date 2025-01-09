<?php
include_once 'cabecera.php';
?>

<main>
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=clients'">Clientes</button>
    </div>
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=orders'">Pedidos</button>
    </div>
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=products'">Productos</button>
    </div>
</main>

<?php
include_once 'pie.php';
?>