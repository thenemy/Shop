<?php


namespace App\Domain\Product\Entities\HeaderComponent\TextComponent\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;

class ImageText extends Entity
{
    protected $table = 'image_texts';

    use MediaTrait;

    public function imageText(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TextComponent::class);
    }

    public function getImageTextAttribute($value)
    {
        return $this->getMedia('image', $value);
    }

    public function setImageTextAttribute($value)
    {
        $this->setPublicMedia('image', $value);
    }

    public function getMediaPathStorages()
    {
        return 'text_components/image_text';

    }

    public function mediaKeys(): array
    {
        return [
            "image_text"
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
