<?php

namespace App\Domain\Order\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\UuidKey\Traits\HasUniqueId;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\HasUserRelationship;

class UserPurchase extends Entity
{
    use HasUniqueId, HasUserRelationship;

    protected $table = "user_purchases";

    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function getNumberPurchaseAttribute(): int
    {
        return $this->purchases()->count();
    }

    public function deliveryAddress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
//        return $this->belongsTo();
    }
}
