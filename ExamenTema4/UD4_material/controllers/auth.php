<?php
session_start();

include '../model/user.php';

if (isset($_POST['source'])) {
    switch ($_POST['source']) {
        case 'register':
            header('location: ../models/user.php');
            break;
        case 'login':
            header('location: ../views/dashboard.php');
            break;
    }
    //setcookie('users', $username, time() + 86400, '/', 'localhost');
    //setcookie('paswor', $username, time() + 86400, '/', 'localhost');
} else {
    echo '<p>Aún no sé ha registrado nadie</p>';
}


