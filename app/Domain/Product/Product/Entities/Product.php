<?php

namespace App\Domain\Product\Product\Entities;

use App\Domain\Category\Entities\Category;
use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaManyTrait;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Product\HeaderComponent\Header\Entities\HeaderComponent;
use App\Domain\Product\HeaderTable\Entities\HeaderTable;
use App\Domain\Product\HeaderText\Entities\HeaderText;
use App\Domain\Product\Images\Entities\Image;
use App\Domain\Product\Product\Builders\ProductBuilder;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use App\Domain\Shop\Entities\Shop;
use App\Domain\User\Entities\User;
use CardImages;
use Discounts;
use ProductStats;

class Product extends Entity implements ProductInterface
{
    use Translatable, Sluggable, MediaManyTrait;

    public $guarded = [];
    protected $table = "products";

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, "shop_id");
    }

    public function getImagesAttribute()
    {
        return $this->getManyMedia("productImage", "images");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function user_favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "favourites");
    }

    public function productProductStatus()
    {
        return $this->belongsToMany(ProductStats::class);
    }

    public function productImage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function productImageHeader(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CardImages::class, 'product_id');
    }

    public function productProductInfo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductInfo::class, 'product_id');
    }

    public function productKey(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
//        return $this->hasMany(Key::class, 'product_id');
    }

    public function productHeaderText(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderText::class, 'product_id');
    }

    public function productHeaderTable(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderTable::class, 'product_id');
    }

    public function productHeaderComponent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderComponent::class, 'product_id');
    }

    public function productDiscount(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Discounts::class, 'id');
    }

    public function setTitleAttribute($value)
    {
        $this->setTranslate('title', $value);
    }

    public function getTitleAttribute($value): ?string
    {
        return $this->getTranslatable('title');
    }

    public function slugSources(): array
    {
        return [
            'slug' => 'title'
        ];
    }

}

