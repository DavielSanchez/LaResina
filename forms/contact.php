<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recoger datos
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $subject = $_POST["subject"] ?? '';
    $message = $_POST["message"] ?? '';
    
    // Validar
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Todos los campos son requeridos"]);
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Email inválido"]);
        exit;
    }
    
    // Guardar en archivo (para desarrollo)
    $data = [
        'date' => date('Y-m-d H:i:s'),
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ];
    
    $filename = 'contact_messages.json';
    $messages = [];
    
    if (file_exists($filename)) {
        $messages = json_decode(file_get_contents($filename), true) ?? [];
    }
    
    $messages[] = $data;
    
    if (file_put_contents($filename, json_encode($messages, JSON_PRETTY_PRINT))) {
        http_response_code(200);
        echo json_encode(["success" => true, "message" => "¡Mensaje recibido! Te contactaremos pronto."]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Error al guardar el mensaje"]);
    }
    
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
}
?>