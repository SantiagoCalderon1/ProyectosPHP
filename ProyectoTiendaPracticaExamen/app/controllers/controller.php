<?php
include_once '../models/client.php';
include_once '../models/order.php';
include_once '../models/product.php';
include_once '../../config/destroySesion.php';


session_start();

if (isset($_GET['option']) and $_GET['option'] != '') {
    switch ($_GET['option']) {
        case 'clients':
            $clients = client::getAllData();
            include '../views/viewClient.php';
            break;
        case 'orders':
            $orders = order::getAlldata();
            include '../views/viewOrder.php';
            break;
        case 'products':
            $products = product::getAlldata();
            include '../views/viewProduct.php';
            break;
        case 'exit':
            if (!$_SESSION['rememberme']) {
                closeSession();
            }
            header('Location: ../../public/index.php?closedSession=1');
            break;
        default:
            header('Location: ../../public/index.php?closedSession=1');
            break;
    }
}
