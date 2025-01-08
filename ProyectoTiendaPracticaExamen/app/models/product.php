<?php

include_once '../../config/ConexionTienda.php';

class product
{
    public function __construct(
        private int $productId = 0,
        private string $name = '',
        private float $price = 0.0,
        private int $quantity = 0,
        private string $description = ''
    ) {
        //$this->var = $var;
    }

    static public function getAlldata(): array
    {
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM productos product ORDER BY productoId ASC;");
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
    public function insertProduct(product $newProduct): bool
    {
        if (empty($newProduct)) {
            throw new InvalidArgumentException('Error insertando un producto, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO productos VALUE ({$newProduct->productId},'{$newProduct->name}',{$newProduct->price},{$newProduct->quantity},'{$newProduct->description}');");
        closeConexionTienda($conexion);
        return $result;
    }

    // update
    public function updateProduct(product $updateProduct, int $productId): bool
    {
        if (empty($updateProduct)) {
            throw new InvalidArgumentException('Error actualizando un pedido, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $sql = "UPDATE productos SET productoId={$updateProduct->productId}, nombre='{$updateProduct->name}', precio={$updateProduct->price}, cantidad={$updateProduct->quantity}, descripcion='{$updateProduct->description}' WHERE productoId={$productId};";
        $result = $conexion->query($sql);
        closeConexionTienda($conexion);
        return $result;
    }

    //delete 
    public function deleteProduct(int $productId): bool
    {
        if ($productId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("DELETE FROM productos WHERE productoId={$productId};");
        closeConexionTienda($conexion);
        return $result;
    }
    //select
    public function selectProduct(int $productId): ?array
    {
        if ($productId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM productos WHERE productoId={$productId}");
        if ($result->num_rows == 1) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            closeConexionTienda($conexion);
            return $data;
        } else {
            closeConexionTienda($conexion);
            return null;
        }
    }
}
