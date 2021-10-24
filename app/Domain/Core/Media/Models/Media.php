<?php


namespace App\Domain\Core\Media\Models;
// store the file
// save the path

use App\Domain\Core\Media\Interfaces\MediaInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/// this class are needed
///  because we will get the object with help of we can manipulate actual file
/// not just string
class Media implements MediaInterface
{
    private $path;
    public $key;

    public function __construct($path, $key)
    {
        $this->path = $path;
        $this->key = $key;
    }

    private function getFileName(): ?string
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    public function getFilePath()
    {
        return $this->path;
    }

    public function exists()
    {
        return isset($this->path) && Storage::disk()->exists($this->path);
    }

    public function delete(): bool
    {
        Log::error("SECOND" . $this->path);
        Log::error(isset($this->path));
        if (isset($this->path)) {
            return Storage::delete($this->path) && !($this->path = "");

        }
        return false;
    }

    public function storage()
    {
        return Storage::url($this->path);
    }

    public function __get(string $name)
    {
        switch ($name) {
            case "filename":
                return $this->getFileName();
            case "path":
                return $this->getFilePath();
       }
       return null;
    }
}
