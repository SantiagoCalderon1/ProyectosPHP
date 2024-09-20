<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/geo/mammouthhunters.sqlite');

// Verificar la conexión
if (!$db) {
    die("Conexión fallida: " . $db->lastErrorMsg());
}

// Consulta SQL
$query = "SELECT e1.nombre AS nombre_ejercicio, e1.descripcion AS descripcion_ejercicio,
                 e1.foto AS url_imagen_ejercicio, e1.video_url AS url_video_ejercicio
          FROM ejercicio e1;
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios</title>
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
                <th>Nombre Ejercicio</th>
                <th>Descripción Ejercicio</th>
                <th>Imagen Ejercicio</th>
                <th>Video Ejercicio</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['nombre_ejercicio']; ?></td>
                    <td><?php echo $row['descripcion_ejercicio']; ?></td>
                    <td>
                        <?php if (!empty($row['url_imagen_ejercicio'])) { ?>
                            <img src="<?php echo $row['url_imagen_ejercicio']; ?>" alt="Imagen Ejercicio" style="width:100px;">
                        <?php } ?>
                    </td>
                    <td>
                        <?php if (!empty($row['url_video_ejercicio'])) { ?>
                            <iframe width="200" height="113" src="https://www.youtube.com/embed/<?php echo getYouTubeID($row['url_video_ejercicio']); ?>" frameborder="0" allowfullscreen></iframe>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
function getYouTubeID($url) {
    preg_match("/(youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $url, $matches);
    return $matches[2];
}
?>
