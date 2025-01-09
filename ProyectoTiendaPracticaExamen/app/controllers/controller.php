<?php
include_once '../../config/destroySesion.php';


session_start();

if (isset($_GET['option']) and $_GET['option'] != '') {
    switch ($_GET['option']) {
        case 'clients':
            header('Location: controllerClient.php');
            break;
        case 'orders':
            header('Location: controllerOrder.php');
            break;
        case 'products':
            header('Location: controllerProduct.php');
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

