<?php

namespace App\Domain\Order\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Order\Builders\PurchaseBuilder;
use App\Domain\Product\Product\Entities\Product;

class Purchase extends Entity
{
    protected $table = "purchases";
    public $timestamps = true;

    public function newEloquentBuilder($query)
    {
        return new PurchaseBuilder($query);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function userPurchase()
    {
        return $this->belongsTo(UserPurchase::class, 'user_purchase_id');
    }
}
