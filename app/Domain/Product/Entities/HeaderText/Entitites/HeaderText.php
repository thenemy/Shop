<?php


namespace App\Domain\Product\Entities\HeaderText\Entitites;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\Product;

class HeaderText extends Entity
{
    use Translatable;

    protected $table = 'header_texts';

    public function headerText(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function headerValueDot(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderTextValueDot::class,'header_text_id');
    }
    public function headerKeyText(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderTextKeyText::class,'header_text_id');
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

    public function getTextAttribute(): ?string
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
