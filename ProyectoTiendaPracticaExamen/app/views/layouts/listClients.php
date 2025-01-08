    <section class="container-listClients">
        <table>
            <tr>
                <th>Id Cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
            <?php foreach ($clients as $client) {
                echo
                '<tr>
                    <td>' . $client['clienteId'] . '</td>
                    <td>' . $client['nombre'] . '</td>
                    <td>' . $client['apellidos'] . '</td>
                </tr>';
            }
            ?>
        </table>
    </section>
