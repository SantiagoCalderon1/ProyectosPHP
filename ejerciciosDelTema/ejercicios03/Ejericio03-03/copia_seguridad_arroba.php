<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 03-03-arroba</h1>
    <?php
    //copiaSeguridad("datos.txt"); original
    copiaSeguridad("aaa.txt");
    //tuve que crear el archivo yo, porque el PC-14 no tengo permisos para crear archivos desde el código
    leerArchivo("datos-copia.txt");

    function copiaSeguridad($fichero)
    { 
        @file_exists($fichero);
        @file_put_contents("datos-copia.txt", file_get_contents($fichero));
        /**
         * A simple vista casi no se nota, pero ignora los erroes y no imprime nada
         */ 
    }

    function leerArchivo($fichero)
    {
        try {
            if (!file_exists($fichero)) {
                throw new Exception("El fichero no existe");
            }
            echo file_get_contents($fichero);
        } catch (Exception $e) {
            echo "<p>F2, Algo  ha salido mal: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>

</html>