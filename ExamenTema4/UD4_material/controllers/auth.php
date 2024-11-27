<?php
session_start();

include '../data/Usuario.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['source'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $typeForm = $_SESSION['source'] = $_POST['source'];
    $_SESSION['recordarme'] = isset($_POST['recordarme']);

    switch ($typeForm) {
        case '1':
            header('location: ../models/user.php');
            break;
        case '2':
            header('location: ../models/user.php');
            break;
    }

    //setcookie('users', $username, time() + 86400, '/', 'localhost');
    //setcookie('paswor', $username, time() + 86400, '/', 'localhost');

} else {
    echo '<p>Aún no sé ha registrado nadie</p>';
}


