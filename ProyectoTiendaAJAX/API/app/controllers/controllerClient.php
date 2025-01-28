<?php
include_once '../models/client.php';

class controller
{
    public function getAllData(string $clienteId = '')
    {
        if (empty($clienteId)) {
            $data = client::getAllData();
        } else {
            $data = client::getAllData($clienteId);
        }

        if ($data) {
            echo json_encode([
                "success" => true,
                "data" => $data,
                "message" => "Cliente/s obtenido/s"
            ]);
        }
        // si no cumple ninguna de las condiciones llamo a la función que me retorna error
        $this->echoError('Error al actualizar el cliente.');
    }

    public function insert(array $input)
    {
        $nombre = isset($input['nombre']) ? $input['nombre'] : '';
        $apellidos = isset($input['apellidos']) ? $input['apellidos'] : '';

        if (!empty($nombre) && !empty($nombre)) {
            $result = client::insertClient(new client($nombre, $apellidos));
            if ($result) {
                echo json_encode(
                    [
                        "success" => true,
                        "message" => "Cliente agregado con éxito.",
                    ]
                );
            }
        }
        // si no cumple ninguna de las condiciones llamo a la función que me retorna error
        $this->echoError('Error al actualizar el cliente.');
    }

    public function update(array $input)
    {
        $atributos = [];
        $clienteId = isset($input['id']) ? $input['id'] : '';
        $nombre = isset($input['nombre']) ? $input['nombre'] : '';
        $apellidos = isset($input['apellidos']) ? $input['apellidos'] : '';

        if (!empty($clienteId)) {
            if (!empty($nombre)) {
                $atributos[] = "nombre='" . $nombre . "'";
            }
            if (!empty($apellidos)) {
                $atributos[] = "apellidos='" . $apellidos . "'";
            }

            $result = client::updateClient($clienteId, $atributos);
            if ($result) {
                echo json_encode([
                    "success" => true,
                    "message" => "Cliente actualizado correctamente."
                ]);
            }
        }
        // si no cumple ninguna de las condiciones llamo a la función que me retorna error
        $this->echoError('Error al actualizar el cliente.');
    }

    public function delete(array $input)
    {
        $clienteId = isset($input['id']) ? $input['id'] : '';

        if (!empty($clienteId)) {
            $result = client::deleteClient($clienteId);
            if ($result) {
                echo json_encode([
                    "success" => true,
                    "message" => "Cliente eliminado correctamente."
                ]);
            }
        }
        // si no cumple ninguna de las condiciones llamo a la función que me retorna error
        $this->echoError('Error al eliminar el cliente.');
    }

    public function showFormCreate()
    {
        echo json_encode([
            "success" => true,
            "message" => "Mostrando formulario para insertar un nuevo cliente.",
            "data" => $this->getFormCreateHTML()
        ]);
    }

    private function getFormCreateHTML()
    {
        ob_start();
        include '../view/layouts/formInsert.php';
        return ob_get_clean();
    }

    public function showFormUpdate()
    {
        echo json_encode([
            "success" => true,
            "message" => "Mostrando formulario para actualizar un nuevo cliente.",
            "data" => $this->getFormUpdateHTML()
        ]);
    }

    private function getFormUpdateHTML()
    {
        ob_start();
        include '../view/layouts/formUpdate.php';
        return ob_get_clean();
    }

    public function echoError(string $message)
    {
        echo json_encode([
            "success" => false,
            "message" => $message,
            "data" => null
        ]);
    }
}
