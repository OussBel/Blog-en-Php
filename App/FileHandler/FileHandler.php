<?php
declare (strict_types=1);

namespace App\FileHandler;

class FileHandler
{

    public static string $filename = '';

    public static function createFilename(string $filename): string
    {
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = md5($basename);
        $filename = $basename . '.' . $extension;

        return static::$filename = $filename;
    }

    public static function addImage(string $upload_path): bool
    {
        $destination = $upload_path . static::$filename;
        return move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    }

}