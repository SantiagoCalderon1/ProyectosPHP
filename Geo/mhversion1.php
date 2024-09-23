<?php
// Conexión a la base de datos SQLite
$db = new SQLite3('/Applications/XAMPP/htdocs/geo/geo.sqlite');

// Función para obtener todos los ejercicios disponibles
function obtenerEjercicios() {
    global $db;
    $query = "SELECT * FROM ejercicio";
    $result = $db->query($query);
    $ejercicios = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $ejercicios[] = $row;
    }
    return $ejercicios;
}

// Función para obtener los detalles de un ejercicio específico
function obtenerDetallesEjercicio($id_ejercicio) {
    global $db;
    $query = "SELECT * FROM ejercicio WHERE id_ejercicio = :id_ejercicio";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id_ejercicio', $id_ejercicio, SQLITE3_TEXT);
    $result = $stmt->execute();
    return $result->fetchArray(SQLITE3_ASSOC);
}

// Función para agregar una nueva sesión de entrenamiento
function agregarSesionEntrenamiento($nombre, $descripcion) {
    global $db;
    $fecha = date('Y-m-d');
    $query = "INSERT INTO sesionworkout (nombre, descripcion, fecha) VALUES (:nombre, :descripcion, :fecha)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
    $stmt->bindValue(':descripcion', $descripcion, SQLITE3_TEXT);
    $stmt->bindValue(':fecha', $fecha, SQLITE3_TEXT);
    $stmt->execute();
}

// Función para obtener todas las sesiones de entrenamiento
function obtenerSesionesEntrenamiento() {
    global $db;
    $query = "SELECT * FROM sesionworkout";
    $result = $db->query($query);
    $sesiones = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $sesiones[] = $row;
    }
    return $sesiones;
}

// Verificar si se ha enviado un formulario para agregar una nueva sesión de entrenamiento
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_sesion'])) {
    $nombre_sesion = $_POST['nombre_sesion'];
    $descripcion_sesion = $_POST['descripcion_sesion'];
    agregarSesionEntrenamiento($nombre_sesion, $descripcion_sesion);
}

// Verificar si se ha enviado un formulario para ver los detalles de un ejercicio
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ejercicio_id'])) {
    $ejercicio_id = $_GET['ejercicio_id'];
    $detalles_ejercicio = obtenerDetallesEjercicio($ejercicio_id);
}

// Verificar si se ha enviado un formulario para ver los detalles de una sesión de entrenamiento
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sesion_id'])) {
    $sesion_id = $_GET['sesion_id'];
    // Aquí puedes implementar una función similar a obtenerDetallesEjercicio para obtener los detalles de una sesión específica
}

// Verificar si se ha enviado un formulario para eliminar una sesión de entrenamiento
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_sesion_id'])) {
    $sesion_id = $_POST['eliminar_sesion_id'];
    // Aquí puedes implementar una función para eliminar la sesión de entrenamiento con el ID dado
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>App de Entrenamiento</title>
</head>
<body>
    <h1>App de Entrenamiento</h1>

    <h2>Agregar Nueva Sesión de Entrenamiento</h2>
    <form method="post" action="">
        <label for="nombre_sesion">Nombre:</label>
        <input type="text" name="nombre_sesion" id="nombre_sesion" required>
        <label for="descripcion_sesion">Descripción:</label>
        <textarea name="descripcion_sesion" id="descripcion_sesion" required></textarea>
        <input type="submit" value="Agregar Sesión">
    </form>

    <h2>Lista de Sesiones de Entrenamiento</h2>
    <ul>
        <?php
        $sesiones = obtenerSesionesEntrenamiento();
        foreach ($sesiones as $sesion) {
            echo "<li><a href=\"?sesion_id={$sesion['id_sesion']}\">{$sesion['nombre']}</a> - {$sesion['fecha']}</li>";
        }
        ?>
    </ul>

    <h2>Lista de Ejercicios Disponibles</h2>
    <ul>
        <?php
        $ejercicios = obtenerEjercicios();
        foreach ($ejercicios as $ejercicio) {
            echo "<li><a href=\"?ejercicio_id={$ejercicio['id_ejercicio']}\">{$ejercicio['nombre']}</a></li>";
        }
        ?>
    </ul>

    <?php if (isset($detalles_ejercicio)): ?>
    <h2>Detalles del Ejercicio</h2>
    <p><strong>Nombre:</strong> <?php echo $detalles_ejercicio['nombre']; ?></p>
    <p><strong>Descripción:</strong> <?php echo $detalles_ejercicio['descripcion']; ?></p>
    <p><strong>Tener en cuenta:</strong> <?php echo $detalles_ejercicio['ten_encuenta']; ?></p>
    <p><strong>Video URL:</strong> <a href="<?php echo $detalles_ejercicio['video_url']; ?>"><?php echo $detalles_ejercicio['video_url']; ?></a></p>
    <?php endif; ?>

    <?php
    // Cerrar la conexión a la base de datos
    $db->close();
    ?>
</body>
</html>
