<?php
$project_path = __DIR__ . '/../../'; // Directorio del proyecto local
$remote_version_url = 'https://raw.githubusercontent.com/andresmelendez/SAP-Business-One-Client/main/version.txt';
$local_version_file = $project_path . 'version.txt';
$temp_zip_file = sys_get_temp_dir() . '/temp_project_' . uniqid() . '.zip'; // Archivo ZIP temporal

// Descargar la versión remota
$remote_version = trim(file_get_contents($remote_version_url));
$local_version = file_exists($local_version_file) ? trim(file_get_contents($local_version_file)) : null;

if ($local_version !== $remote_version) {
    // Descargar el archivo ZIP del repositorio
    $zip_url = 'https://github.com/andresmelendez/SAP-Business-One-Client/archive/refs/heads/main.zip';
    file_put_contents($temp_zip_file, file_get_contents($zip_url));

    // Descomprimir el archivo ZIP
    $zip = new ZipArchive();
    if ($zip->open($temp_zip_file) === TRUE) {
        $zip->extractTo($project_path);
        $zip->close();

        // Eliminar el archivo ZIP temporal
        unlink($temp_zip_file);

        // Eliminar la carpeta de ejemplo de GitHub 'SAP-Business-One-Client-main' y mover los archivos a la ruta del proyecto local
        $extracted_folder = $project_path . 'SAP-Business-One-Client-main';
        moveFolder($extracted_folder, $project_path);

        // Asegúrate de que todos los archivos dentro del directorio hayan sido eliminados antes de usar rmdir
        removeDirectory($extracted_folder); // Usamos una nueva función para eliminar el directorio y su contenido

        // Actualizar el archivo version.txt con la nueva versión
        file_put_contents($local_version_file, $remote_version);

        
    }
}

function moveFolder($src, $dest)
{
    if (!is_dir($src)) {
        echo "El directorio de origen no existe.";
        return;
    }
    
    // Intentar crear el directorio de destino, si no existe
    if (!is_dir($dest)) {
        if (!mkdir($dest, 0777, true)) {
            echo "Error al crear el directorio: $dest";
            return;
        }
    }

    $dir = opendir($src);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcPath = $src . DIRECTORY_SEPARATOR . $file;
            $destPath = $dest . DIRECTORY_SEPARATOR . $file;
            if (is_dir($srcPath)) {
                moveFolder($srcPath, $destPath); // Llamada recursiva para directorios
            } else {
                if (!copy($srcPath, $destPath)) {
                    echo "Error al copiar el archivo: $srcPath a $destPath";
                }
            }
        }
    }
    closedir($dir);
}

function removeDirectory($dir)
{
    // Verifica si el directorio existe y no está vacío
    if (is_dir($dir)) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            $filePath = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($filePath)) {
                removeDirectory($filePath); // Llamada recursiva para eliminar subdirectorios
            } else {
                unlink($filePath); // Elimina los archivos
            }
        }
        rmdir($dir); // Finalmente elimina el directorio vacío
    }
}
?>
