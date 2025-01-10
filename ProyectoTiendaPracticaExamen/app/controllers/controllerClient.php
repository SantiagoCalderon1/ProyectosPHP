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

            updateForm($_POST);
            break;
        case 'insertFrom':
            insertForm($_POST);
            break;
        case 'deleteForm':
            deleteForm($_POST);
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lógica para manejo GET, si es necesario
}

include '../views/viewClient.php';

// Función para obtener clientes seleccionados con el checkbox
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

// Función para obtener clientes seleccionados con el checkbox
function getSelectedClients($formData, $clients): array
{
    $checkBoxes = [];
    if (isset($formData['checkBoxIdClient']) && is_array($formData['checkBoxIdClient'])) {
        $selectedClientsId = $formData['checkBoxIdClient'];
        foreach ($selectedClientsId as $selectedClientId) {
            foreach ($clients as $client) {
                if ($client['clienteId'] == $selectedClientId) {
                    $checkBoxes['client'] = $client;
                    $checkBoxes['isChecked'] = true;
                }
            }
        }
    } else {
        echo "Datos incompletos.";
    }
    return $checkBoxes;
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


function updateForm($formData)
{
    if (isset($formData['clientId'], $formData['name'], $formData['surname'])) {
        return client::updateClient(new client($formData['clientId'], $formData['name'], $formData['surname']));
    }
    return false;
}

// Funciones vacías para futuras implementaciones
function insertForm($formData)
{
    if (isset($formData['name'], $formData['surname'])) {
        return client::insertClient(new client($formData['name'], $formData['surname']));
    }
    return false;
}

function deleteForm($formData)
{
    if (isset($formData['clientId'])) {
        return client::deleteClient($formData['clientId']);
    }
    return false;
}
