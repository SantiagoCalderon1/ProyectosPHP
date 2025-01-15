<?php

session_start();
include_once '../models/user.php';

if (isset($_POST['username'], $_POST['password']) and $_POST['username'] != '' and $_POST['password'] != '') {
    $user = user::checkLogin($_POST['username'], $_POST['password']);
    if ($user) {
        if (isset($_SESSION['rememeberme'])) {
            $_SESSION['user'] = $user[0];
            $_SESSION['rememeberme'] = true;
        }
        header('Location: controller.php');
        exit;
    }else{
        header('Location: ../../public/index.php?authenticationError=1');
    }
}
