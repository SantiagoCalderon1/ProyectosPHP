<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controllers/controller.php" method="post">
        <input type="hidden" name="action" value="deleteForm">
        <input type="hidden" name="empleadoId" value="<?php echo htmlspecialchars($clienteSelected[0]['id']) ?>">
        <p>Esta seguro de eliminar al empleado con ID: <?php echo htmlspecialchars($clienteSelected[0]['id']) ?> y nombre: <?php echo htmlspecialchars($clienteSelected[0]['nombre']) ?> </p>
        <input type="submit" value="Aceptar">
        <a href="">Cancelar</a>
    </form>
</body>

</html>