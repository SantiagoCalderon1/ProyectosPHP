<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/Geo/mammouthhunters.sqlite');

// Verificar la conexión
if (!$db) {
    die("Conexión fallida: " . $db->lastErrorMsg());
}

// Consulta SQL
$query = "SELECT nombre, descripcion , ten_encuenta, foto , video_url
          FROM ejercicio";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 1100px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td img {
            max-width: 250px;
            height: auto;
        }
        td span {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejercicios</h1>
        <table id="ejercicios">
            <thead>
                <tr>
                <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ten encuenta</th>
                    
                    <th>Video</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                    <tr>
                        <td>
                            
                            <?php if (!empty($row['foto'])) { // verifica que la columna foto no este vacía ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']); // se utiliza el esquema de datos data:image/jpeg;base64,?>" alt="Imagen Ejercicio">
                            <?php } else { ?>
                                <span>No disponible</span>
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($row['ten_encuenta']); ?></td>
                        <td>
                            <?php if (!empty($row['video_url'])) { ?>
                                <iframe width="250" height="auto" src="https://www.youtube.com/embed/<?php echo htmlspecialchars(getYouTubeID($row['video_url'])); ?>" frameborder="0" allowfullscreen></iframe>
                            <?php } else { ?>
                                <span>No disponible</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
// Función que recupera el video de youtube
function getYouTubeID($url) {
    preg_match("/(youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $url, $matches);
    return $matches[2];
}
?>
