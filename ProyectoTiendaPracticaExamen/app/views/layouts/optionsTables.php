<?php
include_once 'cabecera.php';
?>

<div class="container-options">
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=clients'">Clientes</button>
    </div>
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=orders'">Pedidos</button>
    </div>
    <div class="option">
        <button onclick="window.location.href='../../controllers/controller.php?option=products'">Productos</button>
    </div>
</div>
</header> 
<!-- El header se abre en cabecera -->

<?php
include_once 'pie.php';
?>