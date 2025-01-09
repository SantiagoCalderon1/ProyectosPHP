<div class="formUpdate-box">
    <form action="../app/controllers/controllerClient.php" method="post">
        <input type="hidden" name="updateFormFor" value="client">
        <div class="input">
            <label for="clientId">Id del Cliente: </label>
            <input type="number" name="clientId" id="clientId" value="<?php echo htmlspecialchars($clients['userSelected']['clientId'] ?? '') ?>" disabled>
        </div>
        <div class="input">
            <label for="name">Nombre del Cliente: </label>
            <input type="number" name="name" id="name" value="<?php echo htmlspecialchars($clients['userSelected']['clientId'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="surname">Apellidos del Cliente: </label>
            <input type="number" name="surname" id="surname" value="<?php echo htmlspecialchars($clients['userSelected']['clientId'] ?? '') ?>">
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../app/controllers/controllerClient.php?canceledForm'">
                Cancelar
            </button>
        </div>
    </form>
</div>