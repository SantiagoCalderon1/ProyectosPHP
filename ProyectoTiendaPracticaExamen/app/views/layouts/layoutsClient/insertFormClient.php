<button id="btn-insert">INSERTAR</button>
<div class="formInsert-box ocultar">
    <form action="../controllers/controllerClient.php" method="post" id="formInsertClient">
        <input type="hidden" name="action" value="insertForm" id="formAction">
        <div class="input">
            <label for="clientIdDisable">Id del Cliente: </label>
            <input type="number" name="clientIdDisable" id="clientIdDisable" placeholder="El ID es automatico." disabled>
        </div>
        <div class="input">
            <label for="name">Nombre del Cliente: </label>
            <input type="text" name="name" id="name" value="">
        </div>
        <div class="input">
            <label for="surname">Apellidos del Cliente: </label>
            <input type="text" name="surname" id="surname" value="">
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../app/controllers/controllerClient.php?canceledForm'">
                Cancelar
            </button>
        </div>
    </form>
</div>