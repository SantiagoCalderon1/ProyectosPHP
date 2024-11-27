<?php 
session_start();

//$hora = $time->format('H:i:s');
//$fecha = $time->format('d-m-Y');

if (isset($_POST['note'])) {
    $note = $_POST['note'];
    $username = $_SESSION['username'];
    
    $time = new DateTime('Y-m-d H:m:s');
    
    $created_at = $time->format('Y-m-d H:m:s');
}

function obtenerNota() : Returntype {
    
}

function añadirNota() : Returntype {
    
}
?>