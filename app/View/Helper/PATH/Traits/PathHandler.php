<?php


namespace App\View\Helper\PATH\Traits;


trait PathHandler
{
    public function encodePath(string $path): string
    {
        return str_replace("\\", "%", $path);
    }

    public function decodePath(string $path): string
    {
        return str_replace("%", "\\", $path);
    }
}
