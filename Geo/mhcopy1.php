<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/geo/mammouthhunters.sqlite');

// Verificar la conexión
if (!$db) {
    die("Conexión fallida: " . $db->lastErrorMsg());
}

// Consulta SQL
$query = "SELECT e1.id_ejercicio, e1.nombre AS nombre_ejercicio, e1.descripcion AS descripcion_ejercicio,
                 e2.nombre AS nombre_alternativo, e2.descripcion AS descripcion_alternativa
          FROM ejercicio e1
          LEFT JOIN ejercicio e2 ON e1.ejercicio_alternativo = e2.id_ejercicio";

$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios y Alternativas</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#ejercicios').DataTable();
        });
    </script>
</head>
<body>
    <table id="ejercicios" class="display">
        <thead>
            <tr>
                <th>ID Ejercicio</th>
                <th>Nombre Ejercicio</th>
                <th>Descripción Ejercicio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['id_ejercicio']; ?></td>
                    <td><?php echo $row['nombre_ejercicio']; ?></td>
                    <td><?php echo $row['descripcion_ejercicio']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
