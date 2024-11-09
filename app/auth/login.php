<?php

require '../../database/ConectorBD.php';
require '../../class/SAP/OUSR.php';

header('Content-Type: application/json');
session_start();

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    exit;
}

// Saneamiento de entradas
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$clave = hash('sha3-512', filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING));

// Verificar si los campos están presentes
if (empty($usuario) || empty($clave)) {
    echo json_encode(['status' => 'error', 'message' => 'Usuario y clave son requeridos']);
    exit;
}

// Validar formato del nombre de usuario (solo letras, números y espacios)
if (!preg_match('/^[a-zA-Z0-9 ]+$/', $usuario)) {
    echo json_encode(['status' => 'error', 'message' => 'El nombre de usuario contiene caracteres no permitidos']);
    exit;
}

// Validar clave
$claveValidar = hash('sha3-512', '$' . $usuario . '$');
if ($clave !== $claveValidar) {
    echo json_encode(['status' => 'error', 'message' => 'usuario o clave es incorrecta']);
    exit;
}

// Intentar validar el usuario
$persona = OUSR::validar($usuario, $clave);

// Verificar si la validación fue exitosa
if ($persona === null) {
    echo json_encode(['status' => 'error', 'message' => 'Usuario o clave incorrectos']);
    exit;
}

// Si la validación es correcta, iniciar sesión
$_SESSION['usuario'] = $persona;

// Respuesta exitosa con redirección
echo json_encode([
    'status' => 'success',
    'message' => 'Autenticación exitosa',
    'data' => ['redirect' => 'principal.php?CONTENIDO=app/dashboard/dashboard.php']
]);
exit;
