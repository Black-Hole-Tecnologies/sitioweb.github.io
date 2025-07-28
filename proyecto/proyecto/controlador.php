<?php
require_once './models/User.php';

class UserController {
    public function store($data) {
        if (
            !isset($data['nombre']) || !isset($data['apellido']) ||
            !isset($data['email']) || !isset($data['contrasena'])
        ) {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos"]);
            return;
        }

        $user = new User();
        $success = $user->insert(
            $data['nombre'],
            $data['apellido'],
            $data['email'],
            $data['contrasena']
        );

        if ($success) {
            echo json_encode(["message" => "Usuario guardado con éxito"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Error al guardar usuario"]);
        }
    }
}
