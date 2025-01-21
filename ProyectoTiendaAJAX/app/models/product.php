<?php

include_once '../../config/ConexionTienda.php';

class product
{
    public function __construct(
        private string $productId = '',
        private string $name = '',
        private float $price = 0.0,
        private int $quantity = 0,
        private string $description = ''
    ) {
        //$this->var = $var;
    }

    static public function getAlldata($orderBy): array
    {
        $orderBy = $orderBy !== '' ? $orderBy : 'productoId';
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM productos ORDER BY {$orderBy} ASC;");
        if ($result->num_rows >= 1) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        } else {
            closeConexionTienda($conexion);
            return null;
        }
    }

    //insert 
    static public function insertProduct(product $newProduct): bool
    {
        if (empty($newProduct)) {
            throw new InvalidArgumentException('Error insertando un producto, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO productos VALUE ('{$newProduct->name}',{$newProduct->price},{$newProduct->quantity},'{$newProduct->description}');");
        closeConexionTienda($conexion);
        return $result;
    }

    // update
    public function updateProduct(): bool
    {
        try {
            $conexion = openConexionTienda();
            $result = $conexion->query("UPDATE productos SET nombre='{$this->name}', precio={$this->price}, cantidad={$this->quantity}, descripcion='{$this->description}' WHERE productoId={$this->productId};");
            return $result;
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        } finally {

            closeConexionTienda($conexion);
        }
    }

    //delete 
    static public function deleteProduct(int $productId): bool
    {
        if ($productId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("DELETE FROM productos WHERE productoId={$productId};");
        closeConexionTienda($conexion);
        return $result;
    }
}
