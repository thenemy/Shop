<?php


namespace App\Domain\Product\Entities\Images\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;
use App\Domain\Product\Entities\Product;

class CardImages extends Entity
{
    use MediaTrait;

    protected $table = 'image_headers';

    public function cardImage(){
        $this->hasOne(Product::class,'product_id');
    }

    public function getImageAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia('image',$value);
    }

    public function setImageAttribute($value){
        $this->setPublicMedia('image',$value);
    }

    public function getMediaPathStorages(): string
    {
        return "product/image_header";
    }

    public function mediaKeys(): array
    {
        return [
            "image_header"
        ];
    }

    public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }

    public function livewireComponents(): array
    {
        // TODO: Implement livewireComponents() method.
    }

    public function getTableRows(): array
    {
        // TODO: Implement getTableRows() method.
    }
}
