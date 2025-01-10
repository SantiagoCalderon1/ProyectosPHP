    <section class="container-listClients">
        <div class="box-orderBy">
            <form action="../controllers/controllerClient.php" method="post" id="form-orderBy" >
            <input type="hidden" name="action" value="form-orderBy">
                <select name="orderBy" id="orderBy" onchange="submitForm('form-orderBy')">
                    <option value="">Ordenar Por:</option>
                    <option value="1">Id de cliente</option>
                    <option value="2">Nombre</option>
                    <option value="3">Apellido</option>
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
                <?php foreach ($clients as $client) {
                    echo
                    '<tr>
                    <td><input type="checkbox" class="selectClient" name="checkBoxClientId[]" value="' . $client['clienteId'] . '"></td>
                    <td>' . $client['clienteId'] . '</td>
                    <td>' . $client['nombre'] . '</td>
                    <td>' . $client['apellidos'] . '</td>
                    </tr>';
                }
                ?>
            </table>
        </form>
    </section>