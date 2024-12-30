<script src="/ProyectoTienda/public/js/script.js"></script>
<form action="" method="post" id="formDesplegableProducto">
    <select name="desplegableProducto" id="desplegableProducto" onchange="enviarFormulario('formDesplegableProducto')">
        <option value="-0" >Seleccione un producto</option> 
        <!-- Es -0 para que no de error en la consulta sql por si acaso se le da sin querer a esta opción -->
        <?php
        foreach ($productos as $producto) {
            $seleccionado = ($producto['productoId'] == $productoSeleccionado) ? 'selected' : '';
            echo '<option value="' . $producto['productoId'] . '" '. $seleccionado .' >' . $producto['nombre'] . '</option>';
        }
        ?>
        
    </select>
</form>
