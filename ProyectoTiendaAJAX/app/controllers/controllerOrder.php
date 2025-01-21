<?php
include_once '../models/order.php';
session_start();

$selectedOrders = $_SESSION['selectedOrders'] ?? [];
$orderBy = $_SESSION['orderBy'] ?? ''; // Recuperar el orderBy de la sesión
$orderByFormat = '';
$orders = order::getAllData($orderBy); // Aplicar el orden al cargar los clientes

$depure = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'form-listOrders':
            $_SESSION['selectedOrders'] = $selectedOrders = getSelectedOrders($_POST, $orders);
            break;
        case 'form-orderBy':
            $_SESSION['orderBy'] = $orderBy = $_POST['orderBy'] ?? ''; // Obtener el nuevo orden
            $orders = order::getAllData($orderBy); // Ordenar los clientes
            break;
        case 'updateForm':
            updateForm($_POST);
            if (count($selectedOrders) > 0) {
                array_shift($selectedOrders);
            }
            $_SESSION['selectedOrders'] = $selectedOrders;
            reloadViewOrder();
            break;
        case 'insertFrom':
            insertForm($_POST);
            reloadViewOrder();
            break;
        case 'deleteForm':
            deleteForm($_POST);
            if (count($selectedOrders) > 0) {
                array_shift($selectedOrders);
            }
            $_SESSION['selectedOrders'] = $selectedOrders;
            reloadViewOrder();
            break;
        default:
            echo "Acción no reconocida.";
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['option'] ?? '';

    switch ($action) {
        case 'cancelForm':
            reloadViewClient();
            break;

        default:
            //echo "Acción no reconocida.";
            break;
    }
}

include '../views/viewOrder.php';


function reloadViewOrder(): void
{
    header('Location: ' . $_SERVER['PHP_SELF']);
}

// Función para obtener clientes seleccionados con el checkbox
function getSelectedOrders($formData, $orders): ?array
{
    $checkBoxes = [];
    if (isset($formData['checkBoxIdOrder']) && is_array($formData['checkBoxIdOrder'])) {
        foreach ($formData['checkBoxIdOrder'] as $selectedOrderId) {
            foreach ($orders as $order) {
                if ($order['pedidoId'] == $selectedOrderId) {
                    $checkBoxes[] = ['order' => $order];
                }
            }
        }
    }
    return $checkBoxes;
}

function updateForm($formData)
{
    if (isset($formData['orderId'], $formData['productId'], $formData['clientId'], $formData['date'],$formData['price'] , $formData['description'], $formData['quantity'],)) {
        $updateOrder = new order($formData['orderId'], $formData['productId'], $formData['clientId'], $formData['date'], $formData['price'], $formData['description'], $formData['quantity']);
        return $updateOrder->updateOrder();
    }
    return false;
}

// Funciones vacías para futuras implementaciones
function insertForm($formData)
{
    if (isset($formData['productId'], $formData['clientId'], $formData['date'], $formData['quantity'], $formData['description'])) {
        $productId = $formData['productId'];
        $clientId = $formData['clientId'];
        $date = $formData['date'];
        $quantity = $formData['quantity'];
        $description = $formData['description'];
        if (!empty($productId) && !empty($clientId) && !empty($date) && !empty($quantity)) {
            return order::insertOrder(new order('', $productId, $clientId, $date, $quantity, $description));
        }
    }
    return false;
}

function deleteForm($formData)
{
    if (isset($formData['orderId'])) {
        $orderId = $formData['orderId'];
        if (!empty($orderId)) {
            return order::deleteOrder($orderId);
        }
    }
    return false;
}
