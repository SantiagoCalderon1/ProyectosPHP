<div class="formUpdate-box">
    <form action="../app/controllers/controller.php" method="post">
        <div class="input">
            <label for="clientId">Id del Cliente: </label>
            <input type="number" name="clientId" id="clientId" value="<?php echo htmlspecialchars($client['userSelected']['clientId'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="name">Nombre del Cliente: </label>
            <input type="number" name="name" id="name" value="<?php echo htmlspecialchars($client['userSelected']['clientId'] ?? '') ?>">
        </div>
        <div class="input">
            <label for="surname">Apellidos del Cliente: </label>
            <input type="number" name="surname" id="surname" value="<?php echo htmlspecialchars($client['userSelected']['clientId'] ?? '') ?>">
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button><a href="../app/controllers/controller.php?canceledForm=1"></a></button>
        </div>
    </form>
</div>