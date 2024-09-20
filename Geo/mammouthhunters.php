<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/geo/mammouthhunters.sqlite');

// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del campo de selección de sesión
    $sesion = isset($_POST['sesion']) ? $_POST['sesion'] : '';

    // Consulta para obtener los ejercicios de la sesión seleccionada
    $query = "SELECT ejercicio.nombre, ejercicio.descripcion
              FROM ejercicio
              INNER JOIN sesion ON ejercicio.id_ejercicio = sesion.id_ejercicio
              WHERE sesion.id_sesion = :sesion";

    // Preparar la consulta
    $stmt = $db->prepare($query);
    $stmt->bindValue(':sesion', $sesion, SQLITE3_TEXT);

    // Ejecutar la consulta
    $result = $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Ejercicios por Sesión</title>
</head>
<body>
    <h1>Consulta de Ejercicios por Sesión</h1>
    <form method="post" action="">
        <label for="sesion">Selecciona una sesión:</label>
        <select name="sesion" id="sesion">
            <?php
            // Consulta para obtener las sesiones disponibles
            $query = "SELECT id_sesion, nombre FROM sesionworkout";
            $sesiones = $db->query($query);

            // Mostrar las opciones del select
            while ($row = $sesiones->fetchArray()) {
                echo "<option value=\"{$row['id_sesion']}\">{$row['nombre']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Consultar Ejercicios">
    </form>

    <?php
    // Mostrar los resultados de la consulta
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($result)) {
        echo "<h2>Ejercicios de la sesión seleccionada:</h2>";
        echo "<ul>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<li><strong>{$row['nombre']}</strong>: {$row['descripcion']}</li>";
        }
        echo "</ul>";
    }
    ?>

    <?php
    // Cerrar la conexión a la base de datos
    $db->close();
    ?>
</body>
</html>
