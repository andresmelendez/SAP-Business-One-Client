<?php
require_once '../../database/ConectorBD.php';
require_once '../../class/SAP/OITM.php';

if (isset($_POST['accion'])) {

    switch ($_POST['accion']) {
        case 'Actualizar':
            // Verifica que se haya enviado un archivo
            if (!empty($_FILES['file'])) {
                $uploadsDir = 'Z:\\'; // Define el directorio de subida

                $response = [];

                // Recorre cada archivo subido
                foreach ($_FILES['file']['name'] as $index => $filename) {
                    // Obtén los detalles del archivo
                    $tmpFilePath = $_FILES['file']['tmp_name'][$index];
                    $originalName = pathinfo($filename, PATHINFO_FILENAME); // Nombre sin extensión
                    $extension = pathinfo($filename, PATHINFO_EXTENSION); // Extensión del archivo

                    $parts = explode('_', $originalName);
                    $codigoProducto = $parts[0];
                    $version = $parts[1];

                    // Verificar que el archivo termine exactamente en "_1"
                    if ($version !== '1') {
                        continue; // Salta archivos que no terminan en "_1"
                    }

                    $objeto = new OITM($codigoProducto);
                    $objeto->setItemCode($codigoProducto);

                    // Validación de formato de archivo (sólo PNG y JPG)
                    if (!in_array(strtolower($extension), ['png', 'jpg', 'jpeg'])) {
                        continue; // Salta a la siguiente iteración
                    }

                    // Ruta de destino basada en el código del producto
                    $destinationPath = $uploadsDir . $originalName . '.' . $extension;

                    // Mueve el archivo desde el temporal al destino final
                    if (move_uploaded_file($tmpFilePath, $destinationPath)) {
                        $objeto->setPicturName($filename);
                        $objeto->actualizarImagenes();
                    } else {
                        $response[] = [
                            'status' => 'error',
                            'message' => 'Error al subir el archivo'
                        ];
                    }
                }

                echo json_encode($response);
            } else {
                // En caso de que no se hayan enviado archivos
                echo json_encode(['status' => 'error', 'message' => 'No se enviaron archivos']);
            }
            break;
        default:
            break;
    }
}
