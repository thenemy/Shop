<?php

namespace App\Domain\Order\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\User\Entities\User;

class UserPurchase extends Entity
{
    protected $table = "user_purchases";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function deliveryAddress() {
        return $this->belongsTo();
    }
}
