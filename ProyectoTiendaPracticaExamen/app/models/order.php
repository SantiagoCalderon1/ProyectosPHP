<?php

include_once '../../config/ConexionTienda.php';

class order
{
    public function __construct(
        private string $orderId = '',
        private string $productId = '',
        private string $clientId = '',
        private string $date = '',
        private float $price = 0.0,
        private string $description = '',
        private int $quantity = 0
    ) {
        //$this->var = $var;
    }

    static public function getAllData($orderBy): ?array
    {
        $orderBy = $orderBy !== '' ? $orderBy : 'pedidoId';
        $conexion = openConexionTienda();
        $result = $conexion->query("SELECT * FROM pedidos ORDER BY {$orderBy} ASC;");
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
    static public function insertOrder(order $newOrder): bool
    {
        if (empty($newOrder)) {
            throw new InvalidArgumentException('Error insertando un pedido, verifique los datos.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("INSERT INTO pedidos (productoId, clienteId, fecha, precio, descripcion, cantidad) VALUE ({$newOrder->productId},{$newOrder->clientId},{$newOrder->date},{$newOrder->price},'{$newOrder->description}',{$newOrder->quantity});");
        closeConexionTienda($conexion);
        return $result;
    }

    // update
    public function updateOrder(): bool
    {
        try {
            $conexion = openConexionTienda();
            $sql = "UPDATE pedidos SET productoId={$this->productId}, clienteId={$this->clientId}, fecha='{$this->date}', precio={$this->price}, descripcion='{$this->description}', cantidad={$this->quantity} WHERE pedidoId={$this->orderId};";
            $result = $conexion->query($sql);
            return $result;        
        } catch (Exception $e) {
            echo "<script>console.log('Error: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }finally{
            closeConexionTienda($conexion);
        }
        
    }

    //delete 
    static public function deleteOrder(int $orderId): bool
    {
        if ($orderId < 0) {
            throw new InvalidArgumentException('El campo Id pedido no puede ser negativo.');
        }
        $conexion = openConexionTienda();
        $result = $conexion->query("DELETE FROM pedidos WHERE pedidoId = $orderId;");
        closeConexionTienda($conexion);
        return $result;
    }
}
