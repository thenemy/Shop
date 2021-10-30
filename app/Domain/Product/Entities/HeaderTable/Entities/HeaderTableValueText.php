<?php


namespace App\Domain\Product\Entities\HeaderTable\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderTableValueText extends Entity
{
    use Translatable;

    protected $table = 'header_table_value_texts';

    public function headerTableValueText(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderTableKeyText::class);
    }

    public function getTextAttribute($value): ?string
    {
        return $this->getTranslatable('text');
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
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
