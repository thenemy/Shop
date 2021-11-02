<?php

namespace App\Domain\Product\ProductKey\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\ProductKey\Entities\Key;

class ProductValue extends Entity
{
    use Translatable;

    protected $table = 'product_values';

    public function getTextAttribute($value): ?string
    {
        return $this->getTranslatable('text');
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

    public function value()
    {
        return $this->hasOne(Key::class, 'products_key_id');
    }
}

