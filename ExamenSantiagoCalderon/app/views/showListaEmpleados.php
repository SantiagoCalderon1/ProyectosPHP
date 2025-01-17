<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        .accion {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Lista de Empleados</h1>
    <a class="accion" href="../controllers/controller.php?action=formInsert">Agregar nuevo empleado</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Salario</th>
                <th>Fecha de Contratación</th>
                <th>Puesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado){
                echo '<tr>
                    <td> '. $empleado['id'] .'</td>
                    <td>'. $empleado['nombre'] .'</td>
                    <td>'. $empleado['apellido'] .'</td>
                    <td>'. $empleado['salario'] .'</td>
                    <td>'. $empleado['fecha_contratacion'] .'</td>
                    <td>'. $empleado['puesto'] .'</td>
                    <td>
                        <a href="../controllers/controller.php?action=formShow&&id='.$empleado['id'] .'">Ver</a> |
                        <a href="../controllers/controller.php?action=formUpdate&&id='. $empleado['id'] .'">Editar</a> |
                        <a href="../controllers/controller.php?action=formDelete&&id='. $empleado['id'] .'">Eliminar</a>
                    </td>
                </tr>';
            }?>

        </tbody>
    </table>
    <a class="accion" href="">Actualizar salario empleados (salvo gerente)</a>
</body>

</html>