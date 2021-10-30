<?php


namespace App\Domain\Product\Entities\HeaderTable\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderTableValueLink extends Entity
{
    use Translatable;

    protected $table = 'value_text';

    public function valueText(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HeaderTableKeyText::class);
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
