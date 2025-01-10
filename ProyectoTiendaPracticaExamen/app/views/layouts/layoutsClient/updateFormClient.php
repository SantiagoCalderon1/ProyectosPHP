<button onclick="submitForm('form-listClients')" id="btn-update">ACTUALIZAR</button>

<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerClient.php" method="post" id="formUpdateClient">
        <input type="hidden" name="action" value="updateForm" id="formAction">
        <input type="hidden" name="clientId"  value="<?php echo htmlspecialchars($selectedClients[0]['clienteId'] ?? '') ?>">

        <div class="input">
            <label for="clientIdDisable">Id del Cliente: </label>
            <input type="number" name="clientIdDisable" id="clientIdDisable" value="<?php echo htmlspecialchars($selectedClients[0]['clienteId'] ?? '') ?>" disabled>
        </div>

        <div class="input">
            <label for="name">Nombre del Cliente: </label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($selectedClients[0]['nombre'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="surname">Apellidos del Cliente: </label>
            <input type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($selectedClients[0]['apellidos'] ?? '') ?>">
        </div>

        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../app/controllers/controllerClient.php?canceledForm'">
                Cancelar
            </button>
        </div>
    </form>
</div>