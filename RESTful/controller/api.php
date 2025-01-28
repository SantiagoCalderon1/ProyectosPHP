<?php
include '../model/dbConex.php'; // Archivo para manejar la conexión a la base de datos.

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);
$conexion = conexionBD::conectar(); // Se espera que este método retorne un objeto `mysqli`.

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtener un producto por ID.
            $id = (int) $_GET['id']; // Sanitizar el ID.
            $result = $conexion->query("SELECT * FROM Pedidos WHERE idPed = $id");
            $product = $result->fetch_assoc();
            echo json_encode($product ?: ["error" => "Producto no encontrado"]);
        } else {
            // Obtener todos los productos.
            $result = $conexion->query("SELECT * FROM Pedidos");
            $products = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($products);
        }
        break;

    case 'POST':
        if (!empty($input) && isset($input['nombre'], $input['descripcion'], $input['precio'])) {
            // Crear un nuevo producto.
            $nombre = $input['nombre'];
            $descripcion = $input['descripcion'];
            $precio = (float) $input['precio']; // Asegurar tipo numérico.

            $conexion->query("INSERT INTO Pedidos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', $precio)");
            echo json_encode(["id" => $conexion->insert_id]);
        } else {
            echo json_encode(["error" => "Datos inválidos"]);
        }
        break;

    case 'PUT':
    case 'PATCH':
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id']; // Sanitizar el ID.

            if ($input) {
                // Construir la consulta dinámicamente
                $fields = [];
                if (isset($input['nombre'])) {
                    $fields[] = "nombre='" . $conexion->real_escape_string($input['nombre']) . "'";
                }
                if (isset($input['descripcion'])) {
                    $fields[] = "descripcion='" . $conexion->real_escape_string($input['descripcion']) . "'";
                }
                if (isset($input['precio'])) {
                    $fields[] = "precio=" . (float) $input['precio'];
                }

                // Ejecutar la consulta solo si hay campos a actualizar
                if (!empty($fields)) {
                    $query = "UPDATE Pedidos SET " . implode(', ', $fields) . " WHERE idPed = $id";
                    $conexion->query($query);

                    echo json_encode(["success" => $conexion->affected_rows > 0]);
                } else {
                    echo json_encode(["error" => "No se proporcionaron campos válidos para actualizar"]);
                }
            } else {
                echo json_encode(["error" => "Datos de entrada no válidos"]);
            }
        } else {
            echo json_encode(["error" => "ID no proporcionado"]);
        }
        break;
    case 'DELETE':
        if (isset($_GET['id'])) {
            // Eliminar un producto por ID.
            $id = (int) $_GET['id']; // Sanitizar el ID.
            $conexion->query("DELETE FROM Pedidos WHERE idPed = $id");
            echo json_encode(["success" => $conexion->affected_rows > 0]);
        } else {
            echo json_encode(["error" => "ID no proporcionado"]);
        }
        break;

    default:
        echo json_encode(["error" => "Método no soportado"]);
        break;
}

$conexion->close(); // Cerrar la conexión después de completar la operación.
