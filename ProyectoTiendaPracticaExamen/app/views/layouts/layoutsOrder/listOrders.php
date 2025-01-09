<section class="container-listOrders">
    <table>
        <tr>
            <th>Id Pedido</th>
            <th>Id Producto</th>
            <th>Id Cliente</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
        </tr>
        <?php foreach ($orders as $order) {
            echo 
            '<tr>'.
                '<td>'.$order['pedidoId'].'</td>'.
                '<td>'.$order['productoId'].'</td>'.
                '<td>'.$order['clienteId'].'</td>'.
                '<td>'.$order['fecha'].'</td>'.
                '<td>'.$order['precio'].'</td>'.
                '<td>'.$order['descripcion'].'</td>'.
                '<td>'.$order['cantidad'].'</td>'.
            '</tr>';
        }
        ?>
    </table>
</section>