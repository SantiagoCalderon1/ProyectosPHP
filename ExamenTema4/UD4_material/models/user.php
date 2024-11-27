<?php
session_start();
include_once '../data/Usuario.php';

if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['source'])) {
    define('USERNAME', $_SESSION['username'] ?? 'NoDefinido');
    define('USERPASSWORD', $_SESSION['password'] ?? 'NoDefinido');
    define('RECORDARME', $_SESSION['recordarme'] ?? false);
    $typeForm = $_SESSION['source'];

    $usersJson = '../data/users.json';

    if (file_exists($usersJson)) {
        $content = recuperarUsers($usersJson);
        switch ($typeForm) {
            case '1':
                $registrar = true;
                if (!empty($content)) {
                    if (autenticarUser($content, USERNAME, USERPASSWORD)) {
                        $registrar = false;
                        header('location: ../views/register.php?error=1');
                    }
                    if ($registrar) {
                        registrarUser($usersJson, crearUsuario(new Usuario(USERNAME, USERPASSWORD)));
                        header('location: ../views/dashboard.php');

                    }
                } else {
                    registrarUser($usersJson, crearUsuario(new Usuario(USERNAME, USERPASSWORD)));
                    header('location: ../views/dashboard.php');

                }
                break;
            case '2':
                $enviar = true;
                if (!empty($content)) {
                    if (!autenticarUser($content, USERNAME, USERPASSWORD)) {
                        $enviar = false;
                        header('location: ../views/login.php?error=1');
                    }
                    if ($enviar) {
                        if (RECORDARME) {
                            configurarCookie('username', USERNAME);
                            configurarCookie('password', USERPASSWORD);
                            configurarCookie('recordarme', true);
                            header('location: ../views/dashboard.php');
                        } else {
                            eliminarCookie('username');
                            eliminarCookie('password');
                            eliminarCookie('recordarme');
                            header('location: ../views/dashboard.php');
                        }
                    }
                } else {
                    header('location: ../views/login.php?error=1');
                }
                break;
        }
    }
}

function configurarCookie($nombre, $valor)
{
    setcookie($nombre, $valor, time() + 86400, '/', 'localhost');
}

function eliminarCookie($nombre)
{
    setcookie($nombre, '', time() - 3600, '/', 'localhost');
}


function crearUsuario(object $user): array
{
    return [
        'username' => $user->getUsername(),
        'password' => $user->getPassword()
    ];
}

function registrarUser(string $usersJson, array $user)
{
    $content = recuperarUsers($usersJson);
    $content[] = $user;
    file_put_contents($usersJson, codificar($content));
}

function autenticarUser($users, $userNameAuth, $userPasswordAuth): bool
{
    // Buscamos un usuario que coincida con las credenciales
    foreach ($users as $user) {
        if ($user['username'] === $userNameAuth && $user['password'] === $userPasswordAuth) {
            return true; // Autenticado correctamente
        }
    }
    return false; // No se encontró el usuario
}

function recuperarUsers($usersJson): array
{
    $content = file_get_contents($usersJson);
    $decodedContent = json_decode($content, true);

    // Verificar si la decodificación fue exitosa
    if (json_last_error() !== JSON_ERROR_NONE) {
        return []; // Si hay un error, retornamos un array vacío
    }

    return $decodedContent ?? []; // Devolver el array de usuarios o un array vacío
}

function codificar($codificar)
{
    return json_encode($codificar, JSON_PRETTY_PRINT);
}
