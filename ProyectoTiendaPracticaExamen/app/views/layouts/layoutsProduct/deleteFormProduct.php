<button id="btn-delete">ELIMINAR</button>
<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerProduct.php" method="post" id="formDeleteProduct">
        <input type="hidden" name="action" value="deleteForm" id="formAction">
        <input type="hidden" name="productId" value="<?php echo htmlspecialchars($selectedProducts[0]['product']['productoId'] ?? '') ?>">

        <div class="textoForm">
            <p>¿Estás seguro que deseas eliminar el producto <span id=""><?php echo htmlspecialchars($selectedProducts[0]['product']['nombre'] ?? '') ?></span> 
            con id <span><?php echo htmlspecialchars($selectedProducts[0]['product']['productoId'] ?? '') ?></span>?</p>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../controllers/controllerProduct.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>