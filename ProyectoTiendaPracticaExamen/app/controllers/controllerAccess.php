<?php
include '../models/user.php';
include '../../config/destroySesion.php';


if (isset($_POST['username'], $_POST['password']) && $_POST['username'] != '' && $_POST['password']) {
    //if (user::checkLogin($_POST['username'], $_POST['password'])) {
    $_SESSION['user'] = $user = user::checkLogin($_POST['username'], $_POST['password']);
    if ($user) {
        session_start();
        $_SESSION['rememberme'] = $_POST['rememberme'] ?? false;
        header('Location: ../views/layouts/optionsTables.php');
        exit;
    }else{
        closeSession();
        header('Location : ../../public/controler.php?authenticationError=1');
        exit;
    }
}


