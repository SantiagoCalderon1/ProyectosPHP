<button id="btn-insert">INSERTAR</button>
<div class="formInsert-box ocultar">
    <form action="../controllers/controllerProduct.php" method="post" id="formInsertProduct">
        <input type="hidden" name="action" value="insertFrom" id="formAction">
        <div class="input">
            <label for="productIdDisable">Id del Producto: </label>
            <input type="number" name="productIdDisable" id="productIdDisable" placeholder="El ID es automatico." disabled>
        </div>
        <div class="input">
            <label for="name">Nombre del producto: </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input">
            <label for="price">Precio: </label>
            <input type="number" name="price" id="price" min="0.01">
        </div>
        <div class="input">
            <label for="quantity">Cantidad: </label>
            <input type="number" name="quantity" id="quantity" min="1">
        </div>
        <div class="input">
            <label for="description">Descripcion: </label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../controllers/controllerClient.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>