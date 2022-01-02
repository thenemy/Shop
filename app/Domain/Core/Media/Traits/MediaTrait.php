<?php


namespace App\Domain\Core\Media\Traits;

use App\Domain\Core\Media\Exceptions\MediaException;
use App\Domain\Core\Media\Interfaces\MediaInterface;
use App\Domain\Core\Media\Models\AsyncWrapperMedia;
use App\Domain\Core\Media\Models\Media;
use App\Domain\Core\Media\Services\MediaService;
use App\Domain\Core\Media\Services\MediaServices;
use Illuminate\Http\UploadedFile;
use function Symfony\Component\Translation\t;

trait MediaTrait
{
    private $mediaObject = [];

    protected static function bootMediaTrait()
    {
        self::deleting(function ($entity) {
            $entity->deleteAllMedia();
        });
    }


    public function getMedia($key, $value = null, $id = 0): Media
    {
        if (isset($this->mediaObject[$key])) {
            return $this->mediaObject[$key];
        }

        if (isset($value)) {
            $this->mediaObject[$key] = new Media($value, $key, $id);
        }
        return $this->mediaObject[$key] ?? new Media("", $key, $id);
    }


    public function setMedia($key, $value, $id)
    {

        if (!isset($this->attributes[$key]) || $value && $this->checkOnTemp($key, $value, $this->attributes[$key])) {
            $this->deleteMedia($key, $this->getOriginalValue($key));
            $this->storeMedia($key, $value, MediaInterface::PUBLIC_PATH, $id);
        }
    }

    final  protected function checkOnTemp($key, $inserted, $previous)
    {
        if ($previous) {
            $old = preg_replace("/\//i", "\/", $previous);
            $new = preg_replace("/\\\/i", "/", $inserted->path());
            return !preg_match("/" . $old . "/i", $new);
        }
        return true;
    }

    public function deleteMedia(string $key, $value)
    {
        $media = $this->getMedia($key, $value);
        if ($media->filename) {
            $media->delete();
            $this->attributes[$key] = "";
            unset($this->mediaObject[$key]);
        }
    }

    protected function getOriginalValue($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function deleteAllMedia()
    {
        foreach ($this->mediaKeys() as $key) {
            $this->deleteMedia($key, $this->getOriginalValue($key));
        }
    }

    private function checkPath($key, UploadedFile $value)
    {
        $path = $value->getPath();
        return preg_match("/storage\/temp\//i", $path) || !preg_match("/public/i", $path);
    }

    public function storeMedia($key, $value, $type, $id)
    {
        if ($value instanceof UploadedFile) {
            $value->extension();
            $this->mediaObject[$key] = MediaServices::createMedia($this->generateBasePath($type), $value, $key, $id);
            $this->attributes[$key] = $this->mediaObject[$key]->path;
        } else if (is_string($value)) {
        } else if ($value instanceof Media) {
            $this->mediaObject[$key] = $value;
            $this->attributes[$key] = $this->mediaObject[$key]->path;
        }
    }

    public function generateBasePath($type)
    {
        return $type . $this->getMediaPathStorages();
    }

    // must be overridden
    public abstract function getMediaPathStorages();

    public abstract function mediaKeys(): array;
}
