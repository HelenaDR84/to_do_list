<?php

class FileUpload
{
    public function uploadFile($file, $maxFileSize)
    {
        $uploadedFileSize = $file['size'];

        if ($uploadedFileSize > $maxFileSize) {
            throw new Exception('El tamaño del archivo excede el límite permitido.');
        }

        $destination = 'ruta/donde/guardar/' . $file['name'];
        move_uploaded_file($file['tmp_name'], $destination);

        return $destination;
    }
}

?>
