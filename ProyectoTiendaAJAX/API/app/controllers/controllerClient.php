<?php
include_once '../models/client.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

header("Content-Type: text/html; charset=UTF-8");

header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$input = json_decode(file_get_contents('php://input'), true);

// Obtén el método HTTP y el recurso solicitado
$method = $_SERVER['REQUEST_METHOD'];
$request = trim($_SERVER['REQUEST_URI'], '/');

// Divide la URI para obtener el recurso y el ID (si aplica)
$uri = explode('/', $request);
$resource = $uri[1] ?? null;
$newUri = $uri[2] ?? null;

switch ($method) {
    case 'GET':
        //if (is_numeric($newUri) || is_null($resource)) {
        $data = getAllData($newUri);

        echo json_encode($data);

        //}

        if ($newUri === 'create') {
            showFormCreate();
        }

        if ($newUri === 'edit') {
            showFormUpdate();
        }
        break;
    case 'POST':
        insert($input);
        break;

    case 'PUT':
    case 'PATCH':
        update($input);
        break;

    case 'DELETE':
        delete($input);
        break;
}


function getAllData(string $clienteId = '')
{
    if (empty($clienteId)) {
        $data = client::getAllData();
    } else {
        $data = client::getAllData($clienteId);
    }

    if ($data) {
        return ($data);
    }
    // si no cumple ninguna de las condiciones llamo a la función que me retorna error
    echoError('Error al actualizar el cliente.');
}

function insert(array $input)
{
    $nombre = isset($input['nombre']) ? $input['nombre'] : '';
    $apellidos = isset($input['apellidos']) ? $input['apellidos'] : '';

    if (!empty($nombre) && !empty($nombre)) {
        $result = client::insertClient(new client($nombre, $apellidos));
        if ($result) {
            echo json_encode(
                [
                    "success" => true,
                    "message" => "Cliente agregado con éxito.",
                ]
            );
        }
    }
    // si no cumple ninguna de las condiciones llamo a la función que me retorna error
    echoError('Error al actualizar el cliente.');
}

function update(array $input)
{
    $atributos = [];
    $clienteId = isset($input['id']) ? $input['id'] : '';
    $nombre = isset($input['nombre']) ? $input['nombre'] : '';
    $apellidos = isset($input['apellidos']) ? $input['apellidos'] : '';

    if (!empty($clienteId)) {
        if (!empty($nombre)) {
            $atributos[] = "nombre='" . $nombre . "'";
        }

        if (!empty($apellidos)) {
            $atributos[] = "apellidos='" . $apellidos . "'";
        }

        $result = client::updateClient($clienteId, $atributos);
        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Cliente actualizado correctamente."
            ]);
        }
    }
    // si no cumple ninguna de las condiciones llamo a la función que me retorna error
    echoError('Error al actualizar el cliente.');
}

function delete(array $input)
{
    $clienteId = isset($input['id']) ? $input['id'] : '';

    if (!empty($clienteId)) {
        $result = client::deleteClient($clienteId);
        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Cliente eliminado correctamente."
            ]);
        }
    }
    // si no cumple ninguna de las condiciones llamo a la función que me retorna error
    echoError('Error al eliminar el cliente.');
}

function showFormCreate()
{
    include '../view/layouts/formInsert.php';
}

function showFormUpdate()
{
    include '../view/layouts/formUpdate.php';
}

function echoError(string $message)
{
    echo json_encode([
        "success" => false,
        "message" => $message,
        "data" => null
    ]);
}
