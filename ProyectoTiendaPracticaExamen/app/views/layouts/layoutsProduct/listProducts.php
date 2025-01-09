<section class="container-listProducts">
    <table>
        <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
        </tr>
        <?php foreach ($products as $product) {
            echo
            '<tr>' .
                '<td>' . $product['productoId'] . '</td>' .
                '<td>' . $product['nombre'] . '</td>' .
                '<td>' . $product['precio'] . '</td>' .
                '<td>' . $product['cantidad'] . '</td>' .
                '<td>' . $product['descripcion'] . '</td>' .
                '</tr>';
        } ?>
    </table>
</section>