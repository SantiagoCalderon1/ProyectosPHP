<?php
// Recuperar los valores de la sesión
$selectedOrdersId = array_map(function ($item) {
    return $item['order']['pedidoId'];
}, $selectedOrders);
?>
<section class="container-listOrders">
    <div class="select-all">
        <button class="btn" onclick="selectAll('selectOrder'); submitForm('form-listOrders')">Seleccionar Todo</button>
    </div>
    <div class="unselect-all">
        <button class="btn" onclick="unselectAll('selectOrder'); submitForm('form-listOrders')">Deseleccionar Todo</button>
    </div>
    <div class="box-orderBy">
    <form action="../controllers/controllerOrder.php" method="post" id="form-orderBy">
            <input type="hidden" name="action" value="form-orderBy">
            <label for="orderBy">Ordenar Por:</label>
            <select name="orderBy" id="orderBy" onchange="submitForm('form-orderBy')">
                <option value="1" <?= $orderBy == '1' ? 'selected' : '' ?>>Id del Pedido</option>
                <option value="2" <?= $orderBy == '2' ? 'selected' : '' ?>>Id del Producto</option>
                <option value="3" <?= $orderBy == '3' ? 'selected' : '' ?>>Id del Cliente</option>
                <option value="4" <?= $orderBy == '4' ? 'selected' : '' ?>>Fecha</option>
                <option value="5" <?= $orderBy == '5' ? 'selected' : '' ?>>Precio</option>
                <option value="6" <?= $orderBy == '6' ? 'selected' : '' ?>>cantidad</option>

            </select>
        </form>
    </div>
    <form action="../controllers/controllerOrder.php" method="post" id="form-listOrders">
        <input type="hidden" name="action" value="form-listOrders">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>Id Pedido</th>
                <th>Id Producto</th>
                <th>Id Cliente</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descripción</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td>
                        <input
                            type="checkbox"
                            class="selectOrder"
                            name="checkBoxIdOrder[]"
                            value="<?= $order['pedidoId'] ?>"
                            onchange="submitForm('form-listOrders')"
                            <?= isset($selectedOrdersId) && in_array($order['pedidoId'], $selectedOrdersId) ? 'checked' : '' ?>>
                    </td>
                    <td><?= $order['pedidoId'] ?></td>
                    <td><?= $order['productoId'] ?></td>
                    <td><?= $order['clienteId'] ?></td>
                    <td><?= $order['fecha'] ?></td>
                    <td><?= $order['precio'] ?></td>
                    <td><?= $order['cantidad'] ?></td>
                    <td><?= $order['descripcion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</section>