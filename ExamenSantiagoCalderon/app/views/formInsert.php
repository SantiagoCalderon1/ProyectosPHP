
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../controllers/controller.php" method="post">
    <input type="hidden" name="action" value="insertForm">
    <label for="id">Id: </label>
    <input type="text" placeholder="El id es automatico." disabled><br>
    <label for="name">Nombre: </label>
    <input type="text" name="name" requiered><br>
    <label for="surname">Apellido: </label>
    <input type="text" name="surname" requiered><br>
    <label for="salary">Salario: </label>
    <input type="number" name="salary" requiered><br>
    <label for="date">Fecha de Contratación: </label>
    <input type="date" name="date" requiered><br>
    <label for="puesto">Puesto: </label>
    <!-- No recuerdo como es puesto en ingles -->
    <input type="text" name="puesto" requiered><br>
    <input type="submit" value="Aceptar">
    <a href="">Cancelar</a>
</form>

</body>
</html>