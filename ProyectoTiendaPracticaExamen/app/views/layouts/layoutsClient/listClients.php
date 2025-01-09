    <section class="container-listClients">
        <div class="box-orderBy">
            <select name="orderBy" id="orderBy">
                <option value="">Ordenar Por:</option>
                <option value="clientId">Id de cliente</option>
                <option value="clientName">Nombre</option>
                <select name="clientSurname" id="clientSurname"></select>
            </select>
        </div>
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
                    <td><input type="checkbox" id="selectClient" name="selectClient" value="' . $client['clienteId'] . '"></td>
                    <td>' . $client['clienteId'] . '</td>
                    <td>' . $client['nombre'] . '</td>
                    <td>' . $client['apellidos'] . '</td>
                </tr>';
            }
            ?>
        </table>
    </section>