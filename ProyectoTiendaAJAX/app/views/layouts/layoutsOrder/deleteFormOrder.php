<button id="btn-delete">ELIMINAR</button>
<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerOrder.php" method="post" id="formDeleteOrder">
        <input type="hidden" name="action" value="deleteForm" id="formAction">
        <input type="hidden" name="orderId" value="<?php echo htmlspecialchars($selectedOrders[0]['order']['pedidoId'] ?? '') ?>">

        <div class="textoForm">
            <p>¿Estás seguro que deseas eliminar el pedido con id <span><?php echo htmlspecialchars($selectedOrders[0]['order']['pedidoId'] ?? '') ?></span>?</p>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../controllers/controllerOrder.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>