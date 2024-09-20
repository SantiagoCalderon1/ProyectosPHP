<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/geo/geo.sqlite');
// Obtener la provincia seleccionada del formulario
$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
// Construir la consulta SQL con el filtro de la provincia seleccionada
$query = 'SELECT poblacions.*, comarques.nom_c as comarca FROM poblacions JOIN comarques ON poblacions.nom_c = comarques.nom_c';
if ($provincia) {
    $query .= ' WHERE comarques.provincia = :provincia';
}
$query .= ' ORDER BY comarques.nom_c ASC, poblacions.nom ASC';
$stmt = $db->prepare($query);
if ($provincia) {
    $stmt->bindValue(':provincia', $provincia, SQLITE3_TEXT);
}
$result = $stmt->execute();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pueblos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Listado de Pueblos</h1>
    <form method="post" action="">
        <label for="provincia">Selecciona una provincia:</label>
        <select name="provincia" id="provincia">
            <option value="">Todas</option>
            <option value="València" <?php if ($provincia == 'València') echo 'selected'; ?>>València</option>
            <option value="Alacant" <?php if ($provincia == 'Alacant') echo 'selected'; ?>>Alacant</option>
            <option value="Castellò" <?php if ($provincia == 'Castellò') echo 'selected'; ?>>Castellò</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Población</th>
            <th>Extensión</th>
            <th>Altura</th>
            <th>Longitud</th>
            <th>Latitud</th>
            <th>Llengua</th>
            <th>Comarca</th>
        </tr>
        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['cod_m']); ?></td>
                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                <td><?php echo htmlspecialchars($row['poblacio']); ?></td>
                <td><?php echo htmlspecialchars($row['extensio']); ?></td>
                <td><?php echo htmlspecialchars($row['altura']); ?></td>
                <td><?php echo htmlspecialchars($row['longitud']); ?></td>
                <td><?php echo htmlspecialchars($row['latitud']); ?></td>
                <td><?php echo htmlspecialchars($row['llengua']); ?></td>
                <td><?php echo htmlspecialchars($row['comarca']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php
    // Cerrar la conexión a la base de datos
    $db->close();
    ?>
</body>
</html>
