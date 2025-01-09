<?php
include '../models/client.php';
include '../models/order.php';
include '../models/product.php';
include '../../config/destroySesion.php';


session_start();

if (isset($_GET['option']) and $_GET['option'] != '') {
    switch ($_GET['option']) {
        case 'clients':
            $clients = client::getAllData();
            include '../views/viewClient.php';
            break;

        case 'orders':
            # code...
            break;

        case 'products':
            # code...
            break;
        case 'exit':
            if ($_SESSION['rememberme'] == 'on') {
                header('Location: ../../public/index.php?closedSession=1');
            }
            closeSession();
            break;
        default:
            # code...
            break;
    }
}
