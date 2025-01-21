<button id="btn-insert">INSERTAR</button>
<div class="formInsert-box ocultar">
    <form action="../controllers/controllerOrder.php" method="post" id="formInsertOrder">
        <input type="hidden" name="action" value="insertFrom" id="formAction">
        <div class="input">
            <label for="orderIdDisable">Id del Pedido: </label>
            <input type="number" name="orderIdDisable" id="orderIdDisable" placeholder="El ID es automatico." disabled>
        </div>
        <div class="input">
            <label for="productIdDisable">Id del Cliente: </label>
            <input type="number" name="productId" id="productIdDisable" min="1" required>
        </div>
        <div class="input">
            <label for="clientIdDisable">Id del Cliente: </label>
            <input type="number" name="clientId" id="clientIdDisable" min="1" required>
        </div>
        <div class="input">
            <label for="date">Fecha: </label>
            <input type="date" name="date" id="date" required>
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