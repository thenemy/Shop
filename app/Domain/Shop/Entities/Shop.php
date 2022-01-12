<?php


namespace App\Domain\Shop\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Shop\Builders\ShopBuilder;
use App\Domain\Shop\Interfaces\ShopRelationInterface;
use App\Domain\Shop\Traits\MediaShopAttributes;
use App\Domain\User\Entities\User;
use App\Domain\User\Interfaces\UserRelationInterface;

class Shop extends Entity implements ShopRelationInterface
{
    use Sluggable, MediaTrait, MediaShopAttributes;

    protected $table = "shops";
    public $incrementing = false;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "id");
    }

    public function shopAddress(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ShopAddress::class, "id");
    }

    public function newEloquentBuilder($query): ShopBuilder
    {
        return new ShopBuilder($query);
    }

    public function slugSources(): array
    {
        return [
            'slug' => 'name'
        ];
    }

    public function getNameUserAttribute()
    {
        return $this->user[UserRelationInterface::USER_DATA_SERVICE]['name'];
    }

    public function getPhoneUserAttribute()
    {
        return $this->user->phone;
    }

    public static function getRules(): array
    {
        return parent::getRules(); // TODO: Change the autogenerated stub
    }
}
