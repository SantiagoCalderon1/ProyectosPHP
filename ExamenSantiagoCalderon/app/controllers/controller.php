<?php
session_start();
include_once '../models/empleado.php';

$empleados = Empleado::getAllData();
$clienteSelected = [];

//MUESTRO LA VISTA DE LOS EMPLEADOS
include_once '../views/showListaEmpleados.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'insertForm':
            addNewEmployee($_POST);
            break;
        case 'deleteForm':
            deleteEmployee($_POST);
            break;
        case 'updateForm':
            updateEmployee($_POST);
            break;
        default:
            break;
    }
    
    reloadView();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'formShow':
            $id = $_GET['id'] ?? '';
            $clienteSelected = Empleado::getEmployee($id);
            include_once '../views/showEmpleado.php';
            
            break;
        case 'formInsert':
            include_once '../views/formInsert.php';
            break;
        case 'formUpdate':
            $id = $_GET['id'] ?? '';
            $clienteSelected = Empleado::getEmployee($id);
            include_once '../views/formUpdate.php';
            break;
        case 'formDelete':
            $id = $_GET['id'] ?? '';
            $clienteSelected = Empleado::getEmployee($id);
            include_once '../views/formDelete.php';
            break;
        default:
            # code...
            break;
    }
}

/**
 * Me ha fallado el insertar pero me dio tiempo a resolverlo
 * Uncaught TypeError: Empleado::__construct(): Argument #4 
 * ($salario) must be of type float, string given, called 
 * in /var/www/html/ExamenSantiagoCalderon/app/controllers/controller.php 
 * on line 64 
 * 
 * si lo podria arreglar
 */

function addNewEmployee($formData)
{
    if (isset($formData['name'], $formData['surname'], $formData['salary'], $formData['date'], $formData['puesto'])) {
        $result = Empleado::insertEmployee(new Empleado(0, $formData['name'], $formData['surname'], $formData['salary'], $formData['date'], $formData['puesto']));
        return $result;
    }
}


function updateEmployee($formData)
{
    if (isset($formData['id'],$formData['name'], $formData['surname'], $formData['salary'], $formData['date'], $formData['puesto'])) {
        $result = Empleado::updateEmployee(new Empleado($formData['id'],$formData['name'], $formData['surname'], $formData['salary'], $formData['date'], $formData['puesto']));
        return $result;
    }
}


function deleteEmployee($formData)
{
    if (isset($formData['empleadoId'])) {
        $result = Empleado::deleteEmployee($formData['empleadoId']);
        return $result;
    }
}

function reloadView(): void
{
    header('Location: ' . $_SERVER['PHP_SELF']);
}