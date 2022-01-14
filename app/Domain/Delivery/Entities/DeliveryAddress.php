<?php

namespace App\Domain\Delivery\Entities;

use App\Domain\Core\Main\Entities\Entity;

class DeliveryAddress extends Entity
{
    protected $table = "delivery_address";

    public function availableCities(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AvailableCities::class, "city_id");
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), $this->availableCities->toArray());
    }
}
