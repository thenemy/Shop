<?php


namespace App\Domain\Core\Media\Traits;

use App\Domain\Core\Media\Exceptions\MediaException;
use App\Domain\Core\Media\Interfaces\MediaInterface;
use App\Domain\Core\Media\Models\Media;
use App\Domain\Core\Media\Services\MediaService;
use Illuminate\Http\UploadedFile;

trait MediaTrait
{
    private $mediaObject = [];

    protected static function botMediaTrait()
    {
        self::deleting(function ($entity) {
            $entity->deleteAllMedia();
        });
    }

    public function setPublicMedia($key, $value)
    {
        $this->setMedia($key, $value, MediaInterface::PUBLIC_PATH);
    }

    public function setPrivateMedia($key, $value)
    {
        $this->setMedia($key, $value, MediaInterface::PRIVATE_PATH);
    }

    public function getMedia($key, $value = null): Media
    {
        if (isset($this->mediaObject[$key])) {
            return $this->mediaObject[$key];
        }
        if (isset($value)) {
            $this->mediaObject[$key] = new Media($value, $key);
        }
        return $this->mediaObject[$key] ?? new Media("", $key);
    }

    public function setMedia($key, $value, $type)
    {
        $this->deleteMedia($key, $this->getOriginalValue($key));
        $this->storeMedia($key, $value, $type);
    }

    public function deleteMedia(string $key, $value)
    {
        $media = $this->getMedia($key, $value);
        if ($media) {
            $media->delete();
            $this->attributes[$key] = null;
            unset($this->mediaObject[$key]);
        }
    }

    private function getOriginalValue($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function deleteAllMedia()
    {
        foreach ($this->mediaKeys() as $key) {
            $this->deleteMedia($key, $this->getOriginalValue($key));
        }
    }

    public function storeMedia($key, $value, $type)
    {
        if ($value instanceof UploadedFile) {
            $value->extension();
            $this->mediaObject[$key] = MediaService::createMedia($this->generateBasePath($type), $value, $key);
        }
        $this->attributes[$key] = $this->mediaObject[$key]->getFilePath();
    }

    public function generateBasePath($type)
    {
        return $type . $this->getMediaPathStorages();
    }

    // must be overridden
    public abstract function getMediaPathStorages();

    public abstract function mediaKeys(): array;

}
