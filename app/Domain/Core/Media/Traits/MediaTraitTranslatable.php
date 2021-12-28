<?php

namespace App\Domain\Core\Media\Traits;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Media\Models\Media;
use App\Domain\Core\Media\Services\MediaServices;
use Illuminate\Http\UploadedFile;

trait MediaTraitTranslatable
{
    use Translatable, MediaTrait;

    public function getMedia($key, $value = null, $id = 0): Media
    {
        return new Media($value ?? "", $key, $id);
    }

    final protected function getOriginalValue($key)
    {
        return $this->getTranslations($key);
    }

    public function deleteMedia(string $key, $value)
    {
        foreach ($value as $lang => $item) {
            $media = $this->getMedia($key, $item);
            if ($media->filename) {
                $media->delete();
                $this->setTranslate($key, [$lang => ""]);
            }
        }
    }

    public function storeMedia($key, $value, $type, $id)
    {
        foreach ($value as $lang => $item) {
            if ($item instanceof UploadedFile) {
                $item->extension();
                $this->mediaObject[$key] = MediaServices::createMedia($this->generateBasePath($type), $item, $key, $id);
                $this->setTranslate($key, [$lang => $this->mediaObject[$key]->path]);
            } else if (is_string($value)) {
            }
        }
    }
}
