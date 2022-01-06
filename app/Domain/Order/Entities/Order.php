<?php


namespace App\Domain\Order\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Location\Entities\Location;
use App\Domain\Order\Pivot\UserOrders;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\User\Entities\User;

class Order extends Entity
{
    use Translatable;

    public $guarded = [];
    protected $table = "orders";

    public function basket(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "basket");
    }

    public function userOrder(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "users-order")
            ->using(UserOrders::class);
    }

    public function productOrder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, "id");
    }

    public function locationOrder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class, 'order_id');
    }

    public function getOrderJsonAttribute(): ?string
    {
        return $this->getTranslatable('order-json');
    }

    public function setOrderJsonAttribute($value): ?string
    {
        $this->setTranslate('order-json', $value);
    }

}
