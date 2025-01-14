<button id="btn-update">ACTUALIZAR</button>

<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerProduct.php" method="post" id="formUpdateProduct" >
        <input type="hidden" name="action" value="updateForm" id="formAction">
        <input type="hidden" name="productId"  value="<?php  echo htmlspecialchars($selectedProducts[0]['product']['productoId'] ?? '') ?>">

        <div class="input">
            <label for="productIdDisable">Id del Producto: </label>
            <input type="number" name="productIdDisable" id="productIdDisable" value="<?php echo htmlspecialchars($selectedProducts[0]['product']['productoId'] ?? '') ?>" disabled>
        </div>

        <div class="input">
            <label for="name">Nombre del Producto: </label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($selectedProducts[0]['product']['nombre'] ?? '') ?>" required>
        </div>
        <div class="input">
            <label for="price">Precio: </label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($selectedProducts[0]['product']['precio'] ?? '') ?>" min="1" required>
        </div>
        <div class="input">
            <label for="quantity">Cantidad: </label>
            <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($selectedProducts[0]['product']['cantidad'] ?? '') ?>" min="1" required>
        </div>
        <div class="input">
            <label for="description">Descripcion: </label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($selectedProducts[0]['product']['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar" >
            <button onclick="window.location.href='../controllers/controllerproduct.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>