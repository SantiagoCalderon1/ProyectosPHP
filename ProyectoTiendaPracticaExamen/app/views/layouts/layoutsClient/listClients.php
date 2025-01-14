<?php
// Recuperar los valores de la sesión
$selectedClientsIds = array_map(function ($item) {
    return $item['client']['clienteId'];
}, $selectedClients);
?>
<section class="container-listClients">
    <div class="select-all">
        <button class="btn" onclick="selectAll(); submitForm('form-listClients')">Seleccionar Todo</button>
    </div>
    <div class="unselect-all">
        <button class="btn" onclick="unselectAll(); submitForm('form-listClients')">Deseleccionar Todo</button>
    </div>
    <div class="box-orderBy">
        <form action="../controllers/controllerClient.php" method="post" id="form-orderBy">
            <input type="hidden" name="action" value="form-orderBy">
            <label for="orderBy">Ordenar Por:</label>
            <select name="orderBy" id="orderBy" onchange="submitForm('form-orderBy')">
                <option value="1" <?= $orderBy == '1' ? 'selected' : '' ?>>Id de cliente</option>
                <option value="2" <?= $orderBy == '2' ? 'selected' : '' ?>>Nombre</option>
                <option value="3" <?= $orderBy == '3' ? 'selected' : '' ?>>Apellido</option>
            </select>
        </form>
    </div>
    <form action="../controllers/controllerClient.php" method="post" id="form-listClients">
        <input type="hidden" name="action" value="form-listClients">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>Id Cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td>
                        <input
                            type="checkbox"
                            class="selectClient"
                            name="checkBoxIdClient[]"
                            value="<?= $client['clienteId'] ?>"
                            onchange="submitForm('form-listClients')"
                            <?= isset($selectedClientsIds) && in_array($client['clienteId'], $selectedClientsIds) ? 'checked' : '' ?>>
                    </td>
                    <td><?= $client['clienteId'] ?></td>
                    <td><?= $client['nombre'] ?></td>
                    <td><?= $client['apellidos'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</section>