<?php

namespace App\Domain\Common\Banners\Entities;

use App\Domain\Common\Banners\Builders\BannerBuilder;
use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;
use App\Domain\Core\Media\Traits\MediaTraitTranslatable;
use Illuminate\Support\Collection;

class Banner extends Entity
{
    use MediaTraitTranslatable;

    protected $table = "main_banner";

    public function newEloquentBuilder($query)
    {
        return new BannerBuilder($query);
    }

    public function getMediaPathStorages()
    {
        return "banner/image";
    }

    public function getImageAttribute(): ?Collection
    {
        return $this->getTranslations("image");
    }


    public function getImageRuAttribute(): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("image", $this->image['ru']);
    }

    public function getImageUzAttribute(): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("image", $this->image['uz']);
    }

    public function getImageEnAttribute(): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("image", $this->image['en']);
    }

    public function setImageAttribute($value)
    {
        $this->setMedia("image", $value, $this->id);
    }

    public function mediaKeys(): array
    {
        return [
            'image'
        ];
    }
}
