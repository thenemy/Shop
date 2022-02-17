<?php


namespace App\Domain\Order\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Location\Entities\Location;
use App\Domain\Order\Pivot\UserOrders;
use App\Domain\Product\Api\ProductBasket;
use App\Domain\Product\Api\ProductCard;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\User\Entities\User;

class Order extends Entity
{
    use Translatable;

    public $guarded = [];
    protected $table = "orders";
    protected $casts = [
        'order' => 'json'
    ];

    public function setOrderAttribute($value)
    {
        $this->appendToExisting('order', $value);
    }

    public function basket(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "basket");
    }

    public function userOrder(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "users-order")
            ->using(UserOrders::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductBasket::class, "id");
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

    public function toArray()
    {
        return [
            "id" => $this->id,
            "quantity" => $this->quantity,
            "product" => $this->product,
            "shop" => $this->product->shop,
        ];
    }
}
