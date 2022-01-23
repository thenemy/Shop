<?php

namespace App\Domain\Order\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\UuidKey\Traits\HasUniqueId;
use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Delivery\Entities\DeliveryAddress;
use App\Domain\Order\Interfaces\UserPurchaseRelation;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\HasUserRelationship;

class UserPurchase extends Entity implements UserPurchaseRelation
{
    use HasUniqueId, HasUserRelationship;

    protected $table = "user_purchases";
    protected $fillable = [
        'user_id',
        'status'
    ];
    protected $guarded = null;

    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function sumPurchases()
    {
        return $this->purchases()->sum("price");
    }

    public function getNumberPurchaseAttribute(): int
    {
        return $this->purchases()->sum("quantity");
    }

    private function delivery(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Delivery::class, "user_purchase_id");
    }

    public function getDeliveryAddressAttribute()
    {
        return $this->belongsToMany(DeliveryAddress::class, "purchase_address",
            "user_purchase_id",
            "delivery_address_id")->first();
    }
}
