<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas - Registro</title>
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

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Registro de usuario</h1>
    <form action="../controllers/auth.php" method="POST">
        <div>
            <label>Usuario:</label>
            <input type="text" name="username" required />
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required />
        </div>
        <div>
            <button type="submit">Registrarse</button>
            <input type="hidden" name="source" value="1">
        </div>
    </form>
    <div class="error">
        <?php 
        if (isset($_GET['error']) && $_GET['error']== 1) {
            echo '<h2>Ya hay un usuario registrardo con esos datos.</h2>';
        }

        
        ?>
    </div>
</body>

</html>