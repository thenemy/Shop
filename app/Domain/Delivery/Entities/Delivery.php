<?php

namespace App\Domain\Delivery\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Order\Entities\UserPurchase;

/**
 * is it possible to connect several
 * products to one delivery
 * if it is possible there is the method how i can make this
 * formula user_purchase_id + shop_id
 *
 */
class Delivery extends Entity
{
    protected $table = 'delivery';

    public function userPurchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserPurchase::class, 'user_purchase_id');
    }

    public function invoice(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(InvoiceFile::class, "id");
    }
}
