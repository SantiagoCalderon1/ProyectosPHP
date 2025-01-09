<?php
session_start();
?>

<div class="form-box">
    <form action="../app/controllers/controllerAccess.php" method="post">
        <div class="input">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Enter your username"
            value="<?php echo htmlspecialchars($_SESSION['user']['username'] ?? ''); ?>" required>
        </div>
        <div class="input">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" placeholder="Enter your password"
            value="<?php echo htmlspecialchars($_SESSION['user']['password'] ?? ''); ?>" required>
        </div>
        <div class="input">
            <input type="checkbox" id="rememberme" name="rememberme"
            <?php echo isset($_SESSION['rememberme']) ? 'checked' : ''; ?>>
            <label for="rememberme">rememberme</label>
        </div>
        <div class="input">
            <input type="submit" value="Iniciar Sesion">
        </div>
    </form>

    <div class="forgot-password">
        <a href="../app/controllers/controllerAccess.php?forgotPassword=1">Forgot Password?</a>
    </div>
    
</div>
