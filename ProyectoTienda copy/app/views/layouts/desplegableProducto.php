<script src="/ProyectoTienda/public/js/script.js"></script>
<form action="" method="post" id="formDesplegableProducto">
    <select name="desplegableProducto" id="desplegableProducto" onchange="enviarFormulario('formDesplegableProducto')">
        <option value="">Seleccione un producto</option>
        <?php
        foreach ($productos as $producto) {
            $seleccionado = ($producto['productoId'] == $productoSeleccionado) ? 'selected' : '';
            echo '<option value="' . $producto['productoId'] . '" '. $seleccionado .' >' . $producto['nombre'] . '</option>';
        }
        ?>
    </select>
</form>
