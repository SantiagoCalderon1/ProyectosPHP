
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Santiago Calderon</title>
</head>
<body>
    <form action="../app/controllers/controllerAccess.php" method="post">
        <label for="username">username:</label>
        <input type="text" name="username">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input type="submit" value="Iniciar Sesion">
    </form>
    <?php  
    if (isset($_GET['loginError']) and $_GET['loginError'] == 1) {
        echo '<h2>Error en las credenciales, vuelve a intentarlo.</h2>';
    }
    
    ?>
</body>
</html>