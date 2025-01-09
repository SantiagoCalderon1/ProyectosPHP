<?php

include_once '../../config/ConexionTienda.php';

class order
{
    public function __construct(
        private int $orderId = 0,
        private int $productId = 0,
        private int $clientId = 0,
        private ?string $date = null,
        private float $price = 0.0,
        private string $description = '',
        private int $quantity = 0
    ) {
        //$this->var = $var;
    }

    static public function getAlldata(): array
    {
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM pedidos ORDER BY pedidoId ASC;");
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
    public function insertOrder(order $newOrder): bool
    {
        if (empty($newOrder)) {
            throw new InvalidArgumentException('Error insertando un pedido, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO pedidos VALUE ({$newOrder->orderId},{$newOrder->productId},{$newOrder->clientId},{$newOrder->date},{$newOrder->price},'{$newOrder->description}',{$newOrder->quantity});");
        closeConexionTienda($conexion);
        return $result;
    }

    // update
    public function updateOrder(order $updateOrder, int $orderId): bool
    {
        if (empty($updateOrder)) {
            throw new InvalidArgumentException('Error actualizando un pedido, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $sql = "UPDATE pedidos SET pedidoId={$updateOrder->orderId}, productoId={$updateOrder->productId}, clienteId={$updateOrder->clientId}, fecha={$updateOrder->date}, precio={$updateOrder->price}, descripcion='{$updateOrder->description}', cantidad={$updateOrder->quantity} WHERE pedidoId={$orderId};";
        $result = $conexion->query($sql);
        closeConexionTienda($conexion);
        return $result;
    }

    //delete 
    public function deleteOrder(int $orderId): bool
    {
        if ($orderId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("DELETE FROM pedidos WHERE pedidoId = $orderId;");
        closeConexionTienda($conexion);
        return $result;
    }
    //select
    public function selectOrder(int $orderId): ?array
    {
        if ($orderId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }

        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM pedidos WHERE pedidoId = $orderId");
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
