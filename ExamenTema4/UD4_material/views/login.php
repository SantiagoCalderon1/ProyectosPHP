<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas - Login</title>
    <style>
        button {
            width: 120px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color: #556871;
            color: white;
            border: 0;
            cursor: pointer;
        }

        div {
            margin-top: 10px;
        }

        label {
            display: block;
        }

        label.lateral {
            display: inline;
            margin-left: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Login de usuario</h1>
    <?php 
    //  Verificamos que la cookie existe y asignamos sus valores
    $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
    $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
    $recordarme = isset($_COOKIE['recordarme']) && $_COOKIE['recordarme'] == '1' ? 'checked' : ''; // Verifica si la cookie 'recordarme' está activa
    ?>

    <form action="../controllers/auth.php" method="POST">
        <div>
            <label>Usuario:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username)?>" required />
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password)?>"required />
        </div>
        <div>
            <input type="checkbox" name="recordarme" id="recordarme" <?php echo $recordarme?>/>
            <label class="lateral">Recordarme</label>
        </div>
        <div>
            <button type="submit">Entrar</button>
            <input type="hidden" name="source" value="2">
        </div>
    </form>

    <div class="error">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<h2>No hay usuarios registrados con esos datos.</h2>
            <p>Por favor compruebalos o <a href="../views/register.php">Registrate aquí</a></p>';
        }

        ?>
    </div>
</body>

</html>