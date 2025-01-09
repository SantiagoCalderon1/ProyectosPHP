<?php 
session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : '';
$rememberme = isset($_SESSION['rememberme']) && $_SESSION['rememberme'] == 'on' ? "checked" : '';
var_dump($user);
//var_dump($_SESSION['user']);

?>
<form action="../app/controllers/controllerAccess.php" method="post">
    <div class="input">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php htmlspecialchars($user['username'] ?? '')?>" required>
    </div>
    <div class="input">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php htmlspecialchars($user['password'] ?? '')?>" required>
    </div>
    <div class="input">
        <input type="checkbox" id="rememberme" name="rememberme" <?php echo $rememberme?>>
        <label for="rememberme">rememberme</label>
    </div>
    <div class="input">
        <input type="submit" value="Iniciar Sesion">
    </div>
</form>