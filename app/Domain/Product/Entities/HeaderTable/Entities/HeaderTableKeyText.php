<?php


namespace App\Domain\Product\Entities\HeaderTable\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderTableKeyText extends Entity
{
    use Translatable;

    protected $table = 'key_texts';

    public function headerTableKeyText(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderTable::class);
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
