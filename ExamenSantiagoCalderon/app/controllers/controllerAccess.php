<?php 
session_start();
include_once '../models/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password']) and $_POST['username'] != '' and $_POST['password'] != '') {
        $user = user::checkUser($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: controller.php');
        }else{
            closeSession();
            header('Location: ../../public/index.php?loginError=1');
        }
    }
}

function closeSession() {
    session_reset();
    session_destroy();
}