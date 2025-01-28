<?php

require_once 'app/controllers/controllerClient.php';

$controller = new controller();


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$input = json_decode(file_get_contents('php://input'), true);

// Obtén el método HTTP y el recurso solicitado
$method = $_SERVER['REQUEST_METHOD']; // GET, POST, PUT, DELETE
$request = trim($_SERVER['REQUEST_URI'], '/'); // Por ejemplo: 'api/resource/1'

// Divide la URI para obtener el recurso y el ID (si aplica)
$uri = explode('/', $request);
$resource = $uri[1] ?? null; // Ej: 'resource'
$newUri = $uri[2] ?? null;       // Ej: '1' (si existe un ID)
$accion = $uri[3] ?? null;   // Ej: 'accion'

switch ($method) {
    case 'GET':
        if (is_numeric($newUri) or is_null($newUri)) {
            $controller->getAllData($newUri);
        }

        if ($newUri === 'create') {
            $controller->showFormCreate();
        }

        if ($newUri === 'edit') {
            $controller->showFormUpdate();
        }
        break;
    case 'POST':
        $controller->insert($input);
        break;
    case 'PUT':
    case 'PATCH':
        $controller->update($input);
        break;

    case 'DELETE':
        $controller->delete($input);
        break;

    default:
        # code...
        break;
}
