<?php


namespace App\Domain\ProductKey\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\Product;

class Key extends Entity
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
