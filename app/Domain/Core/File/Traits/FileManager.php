<?php

namespace App\Domain\Core\File\Traits;

class FileManager
{

    public function createFile($path, $path_to_write)
    {
        $real_path = $this->convertToPath($path);
        if ($this->checkFileExistence($real_path)) {
            return;
        }
        if (!$this->checkFolderExistence($real_path)) {
            $this->createDirectory($real_path);
        }

    }

    private function checkFileExistence($path): bool
    {
        return file_exists($path);
    }

    private function convertToPath($path)
    {
        return str_replace(".", "/", $path);
    }

    private function checkFolderExistence($path): bool
    {
        $folder = explode("/", $path);
        array_pop($folder);
        return $this->checkFileExistence($folder);
    }

    public function createDirectory($path)
    {
        mkdir($path);
    }

}

