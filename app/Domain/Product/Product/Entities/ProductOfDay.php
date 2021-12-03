<?php

namespace App\Domain\Product\Product\Entities;

use App\Domain\Core\Main\Entities\Entity;

class ProductOfDay extends Entity
{
    public function productOfDay(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'parent_id');
    }

}
