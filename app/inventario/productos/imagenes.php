<?php

// Definir constantes
define('IMAGE_DIRECTORY', 'Z:\\');
define('DEFAULT_IMAGE', 'producto.png');

// Obtener el nombre del archivo de la imagen solicitado
$item = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_STRING);

// Ruta completa de la imagen solicitada
$imagePath = IMAGE_DIRECTORY . ($item ? $item : DEFAULT_IMAGE);

// Verificar si el archivo existe
if (file_exists($imagePath)) {
    // Detectar el tipo MIME del archivo
    $mimeType = mime_content_type($imagePath);
    if ($mimeType === false) {
        // Si no se puede detectar, asumir que es JPEG
        $mimeType = 'image/jpeg';
    }
    // Enviar el encabezado Content-Type
    header('Content-Type: ' . $mimeType);
    // Leer y devolver el archivo
    readfile($imagePath);
    exit;
} else {
    // Si el archivo no existe, cargar la imagen por defecto
    $defaultImagePath = IMAGE_DIRECTORY . DEFAULT_IMAGE;
    header('Content-Type: image/jpeg');
    readfile($defaultImagePath);
    exit;
}

?>
