<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01 json_decode, json_encode</title>
</head>

<body>
    <h1>holaa</h1>
    <?php
    echo '<h1>Json_encode() y Json_decode()</h1>';

    include 'Usuario.php';

    $usuarios = [
        'user1' => new Usuario('Jorge', 20, 'abc@def.com'),
        'user2' => new Usuario('Andres', 21, 'abc@def.com'),
        'user3' => new Usuario('Camilo', 22, 'abc@def.com')
    ];

    function toJson(array $usuarios): string
    {
        $usuariosArray = array_map(function ($usuario): array {
            return [
                'nombre' => $usuario->getNombre(),
                'edad' => $usuario->getEdad(),
                'email' => $usuario->getEmail()
            ];
        }, $usuarios);
        return json_encode($usuariosArray, JSON_PRETTY_PRINT);
    }

    function writeFile(string $Json): void
    {
        file_put_contents('pruebaJson.txt', $Json);
    }

    writeFile(toJson($usuarios));
    echo '<p>Array de usuarios</p>';
    echo toJson($usuarios);
    echo '<p>Fichero escrito correctamente</p>';

    echo '<p>leyendo fichero</p>';

    // Función para leer un fichero y mostrar su contenido
    function readfileContent(string $rutaFile): void
    {
        if (file_exists($rutaFile)) {
            echo '<p><strong>Contenido del fichero (decodificado):</strong></p>';
            $contenido = json_decode(file_get_contents($rutaFile), true); // Convertir a array asociativo
            //echo '<pre>' . print_r($contenido, true) . '</pre>';

            foreach ($contenido as $key => $usuario) {
                echo '<tr>
                        <td>' . $key . '</td>
                        <td>' . $usuario['nombre'] . '</td>
                        <td>' . $usuario['edad'] . '</td>
                        <td>' . $usuario['email'] . '</td>
                    </tr>';
            }
        } else {
            echo '<p><strong>El fichero no existe</strong></p>';
        }
    }
    //readfile('pruebaJson.txt');
    ?>

    <table>
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Email</th>
        </tr>
        <?php readfileContent('pruebaJson.txt');
        ?>
    </table>
</body>

</html>