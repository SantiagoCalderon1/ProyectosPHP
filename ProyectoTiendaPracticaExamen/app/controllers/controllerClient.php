<?php
include_once '../models/client.php';
session_start();

$selectedClients = $_SESSION['selectedClients'] ?? [];
$orderBy = '';
$clients = client::getAllData();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'form-listClients':
            $selectedClients = getSelectedClients($_POST, $clients);
            $_SESSION['selectedClients'] = $selectedClients; // Guardar en sesión
            // Crear un array con los ids de clientes seleccionados
            $selectedClientsIds = array_map(function ($item) {
                return $item['client']['clienteId'];
            }, $selectedClients);
            break;
        case 'resetSelectionClients':
            $_SESSION['selectedClients'] = $selectedClients = [];
            break;
        case 'form-orderBy':
            $clients = orderClientsBy($_POST);
            break;
        case 'updateForm':
            updateForm($_POST);
            if (count($selectedClients) > 0) {
                array_shift($selectedClients);
            }
            $_SESSION['selectedClients'] = $selectedClients;
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
function getSelectedClients($formData, $clients): ?array
{
    $checkBoxes = [];
    if (isset($formData['checkBoxIdClient']) && is_array($formData['checkBoxIdClient'])) {
        foreach ($formData['checkBoxIdClient'] as $selectedClientId) {
            foreach ($clients as $client) {
                if ($client['clienteId'] == $selectedClientId) {
                    $checkBoxes[] = ['client' => $client];
                }
            }
        }
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
