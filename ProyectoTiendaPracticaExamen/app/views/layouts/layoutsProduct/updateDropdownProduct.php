<div class="formUpdate-box">
    <form action="../app/controllers/controllerProduct.php" method="post">
        <input type="hidden" name="updateFormFor" value="product">
        <div class="input">
            <label for="productId">Id del Producto: </label>
            <input type="number" name="productId" id="productId" value="<?php echo htmlspecialchars($products['productSelected']['productoId'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="name">Nombre del Producto: </label>
            <input type="number" name="name" id="name" value="<?php echo htmlspecialchars($products['productSelected']['nombre'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="price">Precio: </label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($products['productSelected']['precio'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="quantity">Cantidad: </label>
            <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($products['productSelected']['cantidad'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="description">Descripcion: </label>
            <textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($products['productSelected']['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../app/controllers/controllerClient.php?canceledForm'">
                Cancelar
            </button>
        </div>
    </form>
</div>