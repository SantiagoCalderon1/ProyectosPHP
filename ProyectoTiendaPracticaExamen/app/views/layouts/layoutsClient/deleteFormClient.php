<button id="btn-delete">ELIMINAR</button>
<div class="formUpdate-box ocultar">
    <form action="../controllers/controllerClient.php" method="post" id="formDeleteClient">
        <input type="hidden" name="action" value="deleteForm" id="formAction">
        <input type="hidden" name="clientId" value="<?php echo htmlspecialchars($selectedClients[0]['client']['clienteId'] ?? '') ?>">

        <div class="textoForm">
            <p>¿Estás seguro que deseas eliminar el cliente <span id=""><?php echo htmlspecialchars($selectedClients[0]['client']['nombre'] ?? '') 
            . ' ' . htmlspecialchars($selectedClients[0]['client']['apellidos'] ?? '') ?></span> con id <span><?php echo htmlspecialchars($selectedClients[0]['client']['clienteId'] ?? '') ?></span>?</p>
        </div>
        <div class="input">
            <input type="submit" value="Aceptar">
            <button onclick="window.location.href='../controllers/controllerClient.php?option=cancelFrorm'">
                Cancelar
            </button>
        </div>
    </form>
</div>