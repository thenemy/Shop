<?php


namespace App\Domain\Product\Entities\HeaderTable\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\Product;

class HeaderTable extends Entity
{
    use Translatable;

    protected $table = 'header_tables';

    public function headerTable(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

    public function getTextAttribute()
    {
        $this->getTranslatable('text');
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
