<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;

class Image extends Entity
{
    use MediaTrait;

    protected $table = 'images';

    public function image(){
        $this->belongsTo(Product::class);
    }

    public function getImageAttribute($value)
    {
        return $this->getMedia('image', $value);
    }

    public function setImageAttribute($value)
    {
        $this->setPublicMedia('image', $value);
    }

    public function getMediaPathStorages(): string
    {
        return "product/image";
    }

    public function mediaKeys(): array
    {
        return [
            "image"
        ];
    }
}
