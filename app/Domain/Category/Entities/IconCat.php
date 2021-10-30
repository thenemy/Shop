<?php


namespace App\Domain\Category\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;

class IconCat extends Entity
{
    use MediaTrait;

    protected $table = "icon_cats";
    public $incrementing = false;

    public function getIconAttribute($value)
    {
        return $this->getMedia("icon", $value);
    }

    public function setIconAttribute($value)
    {
        $this->setPublicMedia("icon", $value);
    }

    public function Category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'id');
    }

    public function getMediaPathStorages(): string
    {
        return "category/icon";
    }

    public function mediaKeys(): array
    {
        return [
            "icon"
        ];
    }
}
