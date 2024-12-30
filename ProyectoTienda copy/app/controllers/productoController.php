<?php

include '../models/Producto.php';

$productos = Producto::getAll();
$productoSeleccionado = ''; 
$pedidosProducto = [];

if (isset($_POST['desplegableProducto'])) {
    $productoSeleccionado = $_POST['desplegableProducto'];
    $pedidosProducto = Producto::getVentasProducto($productoSeleccionado);
}

include '../views/layouts/cabecera.php';
?>
<main>
    <?php
    include '../views/layouts/desplegableProducto.php';

    if ($productoSeleccionado !== '') {
        if (count($pedidosProducto) > 0) {
            include '../views/layouts/listadoVentasProducto.php';
        } else {
            echo '<h2>No hay ventas registradas para este producto.</h2>';
        }
    }
    ?>
</main>
<?php include '../views/layouts/footer.php'; ?>
