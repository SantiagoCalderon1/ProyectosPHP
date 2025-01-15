<?php 
session_start();
?>

<form action="" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['user']['name'] ?? '')?>"><br>
    <label for="password">Password: </label>
    <input type="password" name="password" value="<?php echo htmlspecialchars($_SESSION['user']['password'] ?? '')?>"><br>
    <input type="checkbox" name="rememberme" <?php echo isset($_SESSION['rememberme']) ? 'checked' : ''?>>
    <label for="rememberme">Recuerme</label><br>
    <input type="submit" value="Iniciar Sesion">
</form>
