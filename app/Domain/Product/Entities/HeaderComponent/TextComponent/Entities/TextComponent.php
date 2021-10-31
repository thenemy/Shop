<?php


namespace App\Domain\Product\Entities\HeaderComponent\TextComponent\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\HeaderComponent\Header\Entities\HeaderComponent;
use App\Domain\Product\Entities\HeaderComponent\Header\Entities\ImageComponent;

class TextComponent extends Entity
{
    protected $table = 'text_compoments';
    use Translatable;

    public function textComponent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(HeaderComponent::class,'header_components_id');
    }

    public function textComponentImageText(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ImageComponent::class);
    }
    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

    public function getTextAttribute($value): ?string
    {
        return $this->getTranslatable('text');
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
