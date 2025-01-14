<?php
// Recuperar los valores de la sesión
$selectedProductIds = array_map(function ($item) {
    return $item['product']['productoId'];
}, $selectedProducts);
?>
<section class="container-listProducts">
    <div class="select-all">
        <button class="btn" onclick="selectAll('selectProduct'); submitForm('form-listProducts')">Seleccionar Todo</button>
    </div>
    <div class="unselect-all">
        <button class="btn" onclick="unselectAll('selectProduct'); submitForm('form-listProducts')">Deseleccionar Todo</button>
    </div>
    <div class="box-orderBy">
        <form action="../controllers/controllerProduct.php" method="post" id="form-orderBy">
            <input type="hidden" name="action" value="form-orderBy">
            <label for="orderBy">Ordenar Por:</label>
            <select name="orderBy" id="orderBy" onchange="submitForm('form-orderBy')">
                <option value="1" <?= $orderBy == '1' ? 'selected' : '' ?>>Id de producto</option>
                <option value="2" <?= $orderBy == '2' ? 'selected' : '' ?>>Nombre</option>
                <option value="3" <?= $orderBy == '3' ? 'selected' : '' ?>>Precio</option>
                <option value="4" <?= $orderBy == '4' ? 'selected' : '' ?>>Cantidad</option>
            </select>
        </form>
    </div>
    <form action="../controllers/controllerProduct.php" method="post" id="form-listProducts">
        <input type="hidden" name="action" value="form-listProducts">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descripción</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <input
                            type="checkbox"
                            class="selectProduct"
                            name="checkBoxIdProduct[]"
                            value="<?= $product['productoId'] ?>"
                            onchange="submitForm('form-listProducts')"
                            <?= isset($selectedProductIds) && in_array($product['productoId'], $selectedProductIds) ? 'checked' : '' ?>>
                    </td>
                    <td><?= $product['productoId'] ?></td>
                    <td><?= $product['nombre'] ?></td>
                    <td><?= $product['precio'] ?></td>
                    <td><?= $product['cantidad'] ?></td>
                    <td><?= $product['descripcion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</section>