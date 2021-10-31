<?php


namespace App\Domain\Product\Entities\HeaderComponent\Header\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;

class ImageComponent extends Entity
{
    use MediaTrait;
    protected $table = 'image_components';
    public function imageComponent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HeaderComponent::class);
    }

    public function setImageAttribute($value){
        $this->setPublicMedia('image',$value);
    }
    public function getImageAttribute($value){
        return $this->getMedia('image',$value);
    }

    public function getMediaPathStorages()
    {
        return "header_components/image_components";
    }

    public function mediaKeys(): array
    {
        return [
            "image_component"
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
