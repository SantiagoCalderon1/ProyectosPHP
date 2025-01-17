
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../controllers/controller.php" method="post">
    <input type="hidden" name="action" value="updateForm">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="id">Id: </label>
    <input type="text" value="<?php echo htmlspecialchars($clienteSelected[0]['id']) ?>" disabled><br>
    <label for="name">Nombre: </label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($clienteSelected[0]['nombre']) ?>" requiered><br>
    <label for="surname">Apellido: </label>
    <input type="text" name="surname" value="<?php echo htmlspecialchars($clienteSelected[0]['apellido']) ?>" requiered><br>
    <label for="salary">Salario: </label>
    <input type="number" name="salary" value="<?php echo htmlspecialchars($clienteSelected[0]['salario']) ?>" requiered><br>
    <label for="date">Fecha de Contratación: </label>
    <input type="date" name="date" value="<?php echo htmlspecialchars($clienteSelected[0]['fecha_contratacion']) ?>" requiered><br>
    <label for="puesto">Puesto: </label>
    <!-- No recuerdo como es puesto en ingles -->
    <input type="text" name="puesto" value="<?php echo htmlspecialchars($clienteSelected[0]['puesto']) ?>" requiered><br>
    <input type="submit" value="Aceptar">
    <a href="">Cancelar</a>
</form>

</body>
</html>