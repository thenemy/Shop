<?php

namespace App\Domain\Product\ProductKey\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class ProductKey extends Entity
{
    use Translatable;

    protected $table = 'product_keys';

    public function key()
    {
        $this->hasMany(Product::class);
    }

    public function getTextAttribute($value): ?string
    {
        return $this->getTranslatable('text');
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

}
