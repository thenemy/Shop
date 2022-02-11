<?php

namespace App\Domain\Order\Traits;

use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Delivery\Interfaces\DeliveryStatus;
use Illuminate\Support\Facades\DB;

trait UserPurchaseDelivery
{
    public function delivery(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Delivery::class, "user_purchase_id");
    }

    public function deliveryCount()
    {
        return $this->delivery()->count();
    }

    public function deliveredCount()
    {
        return $this->delivery()->where(DB::raw("status % 10"), "!=", DeliveryStatus::CREATED)->count();
    }
}
