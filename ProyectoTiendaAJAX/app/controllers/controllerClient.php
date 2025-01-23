<?php
include_once '../models/client.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'updateClient':
            $json = file_get_contents("php://input");

            $client = json_decode($json, true);

            if ($client) {
                $id = $client['id'] ?? '';
                $nombre = $client['nombre'] ?? '';
                $apellidos = $client['apellidos'] ?? '';
            }

            $clientAux = new Client($id, $nombre, $apellidos);

            $clientAux->updateClient();
            break;
        case '':
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Acción no reconocida.']);
            exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    $id = $_GET['id'] ?? '';
    switch ($action) {
        case 'getClients':
            $clients = client::getAllData();

            // Enviar respuesta en JSON
             header('Content-Type: application/json');
             echo json_encode($clients);

            exit;

        case 'getClient':
            $client = client::selectClient($id);

            header('Content-Type: application/json');
            echo json_encode($client);
            break;

        default:
            http_response_code(400);
            echo json_encode(['error' => 'Acción no reconocida.']);
            exit;
    }
}


// function reloadViewClient(): void
// {
//     header('Location: ' . $_SERVER['PHP_SELF']);
// }

// // Función para obtener clientes seleccionados con el checkbox
// function getSelectedClients($formData, $clients): ?array
// {
//     $checkBoxes = [];
//     if (isset($formData['checkBoxIdClient']) && is_array($formData['checkBoxIdClient'])) {
//         foreach ($formData['checkBoxIdClient'] as $selectedClientId) {
//             foreach ($clients as $client) {
//                 if ($client['clienteId'] == $selectedClientId) {
//                     $checkBoxes[] = ['client' => $client];
//                 }
//             }
//         }
//     }
//     return $checkBoxes;
// }

// function updateForm($formData)
// {
//     if (isset($formData['clientId'], $formData['name'], $formData['surname'])) {
//         $updateClient = new client($formData['clientId'], $formData['name'], $formData['surname']);
//         return $updateClient->updateClient();
//     }
//     return false;
// }

// // Funciones vacías para futuras implementaciones
// function insertForm($formData)
// {
//     if (isset($formData['name'], $formData['surname'])) {
//         $name = $formData['name'];
//         $surname = $formData['surname'];
//         if (!empty($name) && !empty($surname)) {
//             return client::insertClient(new client('', $name, $surname));
//         }
//     }
//     return false;
// }

// function deleteForm($formData)
// {
//     if (isset($formData['clientId'])) {
//         $clientId = $formData['clientId'];
//         if (!empty($clientId)) {
//             return client::deleteClient($clientId);
//         }
//     }
//     return false;
// }
