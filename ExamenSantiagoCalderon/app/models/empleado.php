<?php
include_once '../../config/conexionEmpresa.php';

class Empleado
{
    public function __construct(
        public string $empleadoId = '',
        public string $nombre = '',
        public string $apellido = '',
        public float $salario = 0,
        public string $fecha_contratacion = '',
        public string $puesto = '',
    ) {}

    static public function getAllData()
    {
        try {
            $conexion = conexionEmpresa();
            $result = $conexion->query("SELECT * FROM empleados ORDER BY id");
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "<script>console.log('Error al obtener todos los empleados.');</script>";
        } finally {
            conexionEmpresa($conexion);
        }
        return false;
    }

    /**
     * Función para obtener un empleado especificando su Id
     * 
     * @param string $empleadoId
     * @return array $result
     */
    static public function getEmployee(string $empleadoId)
    {
        if (empty($empleadoId)) {
            throw new InvalidArgumentException("El id no puede estar vacío");
        }
        try {
            $conexion = conexionEmpresa();
            $result = $conexion->query("SELECT * FROM empleados WHERE id={$empleadoId};");
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "<script>console.log('Error al obtener los datos del empleado.' {$e});</script>";
        } finally {
            conexionEmpresa($conexion);
        }
        return false;
    }

    static public function insertEmployee(Empleado $empleado)
    {
        if (empty($empleado)) {
            throw new InvalidArgumentException("El empleado no puede estar vacío");
        }
        try {
            $conexion = conexionEmpresa();
            $query = "INSERT INTO empleados (nombre,apellido,salario,fecha_contratacion,puesto) VALUES ('{$empleado->nombre}', '{$empleado->apellido}', {$empleado->salario}, '{$empleado->fecha_contratacion}', '{$empleado->puesto}');";
            $result = $conexion->query($query);
            return $result;
        } catch (Exception $e) {
            echo "<script>console.log('Error al insertar los datos del empleado.' {$e});</script>";
        } finally {
            conexionEmpresa($conexion);
        }
        return false;
    }

    /**
     * Función estica que recibe un empleado y lo inserta en la Base de datos
     *  
     * @param string $empleadoId
     * @return array $result
     */

    static public function updateEmployee(Empleado $empleado)
    {
        if (empty($empleado)) {
            throw new InvalidArgumentException("El empleado no puede estar vacío");
        }
        try {
            $conexion = conexionEmpresa();
            $query ="UPDATE empleados SET nombre='{$empleado->nombre}', apellido='{$empleado->apellido}', salario={$empleado->salario}, fecha_contratacion='{$empleado->fecha_contratacion}', puesto='{$empleado->puesto}'  WHERE id={$empleado->empleadoId};";
            $result = $conexion->query($query);
            return $result;
            echo $query;
        } catch (Exception $e) {
            echo "<script>console.log('Error al actualizar los datos del empleado.' {$e});</script>";
        } finally {
            conexionEmpresa($conexion);
        }
        return false;
    }

    /**
     * Función para eliminar un empleado especificando su Id
     * 
     * @param string $empleadoId
     * @return array $result
     */
    static public function deleteEmployee(string $empleadoId)
    {

        try {
            $conexion = conexionEmpresa();
            $result = $conexion->query("DELETE FROM empleados WHERE id={$empleadoId};");
            return $result;
        } catch (Exception $e) {
            echo "<script>console.log('Error al actualizar los datos del empleado.' {$e});</script>";
        } finally {
            conexionEmpresa($conexion);
        }
        return false;
    }

    //POR HACER
    public function doTransaction() {}
}
