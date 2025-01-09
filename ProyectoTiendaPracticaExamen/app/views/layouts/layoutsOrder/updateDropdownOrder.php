<div class="formUpdate-box">
    <form action="../app/controllers/controllerOrder.php" method="post">
        <input type="hidden" name="updateFormFor" value="order">
        <div class="input">
            <label for="clientId">Id del Pedido: </label>
            <input type="number" name="orderId" id="orderId" value="<?php echo htmlspecialchars($orders['orderSelected']['clientId'] ?? '') ?>" disabled>
        </div>
        <div class="input">
            <label for="selectProductoId">Id del Producto: </label>
            <select name="selectProductoId">
                <option value="">Seleccione un producto</option>
                <?php foreach ($products as $product) {
                    echo '<option value="' . $product['productoId'] . '">' . $product['productoId'] . ' | ' . $product['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="input">
            <label for="selectClientId">Id del Cliente: </label>
            <select name="selectClientId">
                <option value="">Seleccione un Cliente</option>
                <?php foreach ($clients as $client) {
                    echo '<option value="' . $client['clienteId'] . '">' . $client['clienteId'] . '  |  ' . $client['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="input">
            <label for="date">Fecha: </label>
            <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($orders['orderSelected']['fecha'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="price">Precio: </label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($orders['orderSelected']['precio'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="quantity">Cantidad: </label>
            <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($orders['orderSelected']['cantidad'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="description">Descripcion: </label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($orders['orderSelected']['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../app/controllers/controllerClient.php?canceledForm'">
                Cancelar
            </button>
        </div>
    </form>
</div>