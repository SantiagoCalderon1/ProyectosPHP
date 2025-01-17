<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles del Empleado</title>
    </head>
    <body>
        <h1>Detalles del Empleado</h1>
        <p>ID: <?php echo htmlspecialchars($clienteSelected[0]['id'])?></p>
        <p>Nombre: <?php echo htmlspecialchars($clienteSelected[0]['nombre'])?></p>
        <p>Apellido: <?php echo htmlspecialchars($clienteSelected[0]['apellido'])?></p>
        <p>Salario: <?php echo htmlspecialchars($clienteSelected[0]['salario'])?></p>
        <p>Fecha de Contratación: <?php echo htmlspecialchars($clienteSelected[0]['fecha_contratacion'])?></p>
        <p>Puesto: <?php echo htmlspecialchars($clienteSelected[0]['puesto'])?></p>
        <a href="../controllers/controller.php">Volver a la lista de empleados</a>
    </body>
</html>