<?php

namespace App\Domain\Product\Header\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderBody extends Entity
{
    use Translatable;

    protected $table = 'header_bodies';

    public function headerBody(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductHeaders::class,'product_id');
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
