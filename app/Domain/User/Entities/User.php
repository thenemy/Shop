<?php


namespace App\Domain\User\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Order\Entities\Order;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\User\Builders\UserBuilder;
use App\Domain\User\Traits\SmsTrait;

class User extends Entity
{
    use SmsTrait;

    protected $table = 'users';
    public $timestamps = true;
    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }

    public function plasticCard(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PlasticUserCard::class);
    }

    public function basket(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'basket');
    }

    public function userOrder(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class, "users_order");
    }

}
