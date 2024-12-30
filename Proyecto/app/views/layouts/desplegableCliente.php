<?php 
include '../app/controllers/clienteController.php';
//ProyectosPHP/ProyectosPHP/Proyecto/app/controllers/clienteController.php

?>
<select name="desplegableCliente" id="desplegableCliente">
    <?php
    $clientes;

    foreach ($clientes as $fila) {
        echo '<option value="'.$fila['clienteId'].'">'.$fila['nombre'] .' '. $fila['apellidos'].'</option>';
    }
?>
    

</select>
