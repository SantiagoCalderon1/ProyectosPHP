<button id="btn-update">ACTUALIZAR</button>

<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerOrder.php" method="post" id="formUpdateOrder" >
        <input type="hidden" name="action" value="updateForm" id="formAction">
        <input type="hidden" name="orderId"  value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['pedidoId'] ?? '') ?>">

        <div class="input">
            <label for="orderIdDisable">Id del Pedido: </label>
            <input type="number" name="orderIdisable" id="orderIdDisable" value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['pedidoId'] ?? '') ?>" disabled>
        </div>
        <div class="input">
            <label for="productIdDisable">Id del Cliente: </label>
            <input type="number" name="productId" id="productIdDisable" value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['productoId'] ?? '') ?>" min="1" required>
        </div>
        <div class="input">
            <label for="clientIdDisable">Id del Cliente: </label>
            <input type="number" name="clientId" id="clientIdDisable" value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['clienteId'] ?? '') ?>" min="1" required>
        </div>
        <div class="input">
            <label for="date">Fecha: </label>
            <input type="date" name="date" id="date" value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['fecha'] ?? '') ?>" required>
        </div>
        <div class="input">
            <label for="price">Precio: </label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($selectedOrders[0]['order']['precio'] ?? '') ?>" min="1" required>
        </div>
        <div class="input">
            <label for="quantity">Cantidad: </label>
            <input type="number" name="quantity" id="quantity" value="<?php  echo htmlspecialchars($selectedOrders[0]['order']['cantidad'] ?? '') ?>" min="1">
        </div>
        <div class="input">
            <label for="description">Descripcion: </label>
            <textarea name="description" id="description" cols="30" rows="10"><?php  echo htmlspecialchars($selectedOrders[0]['order']['descripcion'] ?? '') ?></textarea>
        </div>

        <div class="input">
            <input type="submit" value="Aceptar" >
            <button onclick="window.location.href='../controllers/controllerClient.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>