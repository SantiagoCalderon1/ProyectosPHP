<?php
include_once '../models/product.php';
session_start();

$selectedProducts = $_SESSION['selectedProducts'] ?? [];
$orderBy = $_SESSION['orderBy'] ?? ''; // Recuperar el orderBy de la sesión
$orderByFormat = '';
$products = product::getAllData($orderBy); // Aplicar el orden al cargar los clientes

$depure = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'form-listProducts':
            $_SESSION['selectedProducts'] = $selectedProducts = getSelectedProducts($_POST, $products);
            break;
        case 'form-orderBy':
            $_SESSION['orderBy'] = $orderBy = $_POST['orderBy'] ?? ''; // Obtener el nuevo orden
            $clients = client::getAllData($orderBy); // Ordenar los clientes
            break;
        case 'updateForm':
            updateForm($_POST);
            if (count($selectedProducts) > 0) {
                array_shift($selectedProducts);
            }
            $_SESSION['selectedProducts'] = $selectedProducts;
            reloadViewClient();
            break;
        case 'insertFrom':
            insertForm($_POST);
            reloadViewClient();
            break;
        case 'deleteForm':
            deleteForm($_POST);
            if (count($selectedProducts) > 0) {
                array_shift($selectedProducts);
            }
            $_SESSION['selectedProducts'] = $selectedProducts;
            reloadViewClient();
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

include '../views/viewProduct.php';


function reloadViewClient(): void
{
    header('Location: ' . $_SERVER['PHP_SELF']);
}

// Función para obtener clientes seleccionados con el checkbox
function getSelectedProducts($formData, $products): ?array
{
    $checkBoxes = [];
    if (isset($formData['checkBoxIdProduct']) && is_array($formData['checkBoxIdProduct'])) {
        foreach ($formData['checkBoxIdProduct'] as $selectedProductId) {
            foreach ($products as $product) {
                if ($product['productoId'] == $selectedProductId) {
                    $checkBoxes[] = ['product' => $product];
                }
            }
        }
    }
    return $checkBoxes;
}

function updateForm($formData)
{
    if (isset($formData['productId'], $formData['name'], $formData['price'], $formData['quantity'], $formData['description'])) {
        $updateProduct = new product($formData['productId'], $formData['name'], $formData['price'], $formData['quantity'], $formData['description']);
        return $updateProduct->updateProduct();
    }
    return false;
}

// Funciones vacías para futuras implementaciones
function insertForm($formData)
{
    if (isset( $formData['name'], $formData['price'], $formData['quantity'], $formData['description'])) {
        $name = $formData['name'];
        $price = $formData['price'];
        $quantity = $formData['quantity'];
        if (!empty($name) && !empty($surname) && !empty($price) && !empty($quantity)) {
            return product::insertProduct(new product('', $name, $price, $quantity, $formData['description']));
        }
    }
    return false;
}

function deleteForm($formData)
{
    if (isset($formData['productId'])) {
        $productId = $formData['productId'];
        if (!empty($productId)) {
            return product::deleteProduct($productId);
        }
    }
    return false;
}
