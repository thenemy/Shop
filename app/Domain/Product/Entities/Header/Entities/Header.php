<?php


namespace App\Domain\Product\Entities\Header\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\HeaderTable\Entities\HeaderTable;
use App\Domain\Product\Entities\Product;

class Header extends Entity
{
    use Translatable;
    protected $guarded =[];
    protected $table = 'product_headers';

    public function header(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function bodyHeader(){
        return $this->hasMany(HeaderTable::class,'product_id');
    }

    public function getTextAttribute(): ?string
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
