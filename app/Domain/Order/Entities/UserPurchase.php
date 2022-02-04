<?php

namespace App\Domain\Order\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\UuidKey\Traits\HasUniqueId;
use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Delivery\Entities\DeliveryAddress;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Order\Builders\UserPurchaseBuilder;
use App\Domain\Order\Interfaces\UserPurchaseRelation;
use App\Domain\Payment\Entities\Payment;
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
    public function newEloquentBuilder($query)
    {
        return new UserPurchaseBuilder($query);
    }

    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Purchase::class , "user_purchase_id");
    }

    public function sumPurchases()
    {
        return $this->purchases()->sum("price");
    }

    public function getNumberPurchaseAttribute(): int
    {
        return $this->purchases()->sum("quantity");
    }

    public function payble()
    {
        if($this->status % 1000 == self::INSTALMENT || $this->takenCredit()->exists()) {
            return $this->takenCredit;
        }
        else if ($this->status % 1000 == self::INSTANCE_PAYMENT || $this->payment()->exists()) {
            return $this->payment;
        }
        throw new \Exception(sprintf("Отсутствует тип платежа. Номер в системе: %s ", $this->id));
    }

    // mutually exclusive takenCredit and payment
    public function takenCredit()
    {
        return $this->hasOne(TakenCredit::class, "purchase_id");
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, "purchase_id");
    }

    public function delivery(): \Illuminate\Database\Eloquent\Relations\HasMany
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
