<?php
include_once '../models/client.php';
session_start();

$selectedClients = [];
$clients = client::getAllData();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'form-listClients':
            $selectedClients = [];
            $selectedClients = getSelectedClients($_POST, $clients);
            break;
        case 'form-orderBy':
            $clients = orderClientsBy($_POST);
            break;
        case 'updateForm':
            updateClient($_POST);
            //echo 'resultado ' . (updateClient($_POST) ? 'correcto' : 'incorrecto');
            break;
        case 'insertFrom':
            break;
        case 'deleteForm':
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lógica para manejo GET, si es necesario
}

// Actualizar cliente

include '../views/viewClient.php';

// Función para obtener clientes seleccionados
function getSelectedClients($formData, $clients): array
{
    $selectedClients = [];
    if (isset($formData['checkBoxClientId']) && is_array($formData['checkBoxClientId'])) {
        $selectedClientsId = $formData['checkBoxClientId'];
        foreach ($selectedClientsId as $selectedClientId) {
            foreach ($clients as $client) {
                if ($client['clienteId'] == $selectedClientId) {
                    $selectedClients[] = $client;
                }
            }
        }
    } else {
        echo "Datos incompletos.";
    }
    return $selectedClients;
}

// Función para ordenar clientes
function orderClientsBy($formData): ?array
{
    $clients = [];
    if (isset($formData['orderBy']) && $formData['orderBy'] != '') {
        switch ($formData['orderBy']) {
            case '1':
                $clients = client::getAllData(); // Default por clienteId
                break;
            case '2':
                $clients = client::getAllData('nombre');
                break;
            case '3':
                $clients = client::getAllData('apellidos');
                break;
            default:
                echo "Orden no reconocido.";
                break;
        }
    }
    return $clients;
}

// Funciones vacías para futuras implementaciones
function clearForm(): void {}


function updateClient($formData)
{
    //$result = false;
    if (isset($formData['updateForm'], $formData['clientId'], $formData['name'], $formData['surname'])) {
        
        $updateClient = new client($formData['clientId'], $formData['name'], $formData['surname']);
        var_dump($updateClient);
        //$result = $updateClient->updateClient();
    }
    //return $result;
}
function insertForm(): void {}
function deleteForm(): void {}
