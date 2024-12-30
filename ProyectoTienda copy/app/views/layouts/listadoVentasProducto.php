
<table id="listadoPedidos">
    <tr>
        <th>ID pedido</th>
        <th>ID Producto</th>
        <th>ID Cliente</th>
        <th>Fecha</th>
        <th>Precio</th>
        <th>Descripcion</th>
        <th>Cantidad Vendida</th>
    </tr>
    <tr>
        <?php
        foreach ($pedidosProducto as $pedido) {
            //var_dump($pedido);
            echo '<tr>' .
                '<td>' . $pedido['pedidoId'] . '</td>' .
                '<td>' . $pedido['productoId'] . '</td>' .
                '<td>' . $pedido['clienteId'] . '</td>' .
                '<td>' . $pedido['fecha'] . '</td>' .
                '<td>' . $pedido['precio'] . '</td>' .
                '<td>' . $pedido['descripcion'] . '</td>' .
                '<td>' . $pedido['cantidad'] . '</td>' .
                '</tr>';
        }
        ?>
    </tr>
</table>