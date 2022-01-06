<?php

namespace App\Domain\Product\Product\Entities;

use App\Domain\Category\Entities\Category;
use App\Domain\Core\Front\Admin\File\Attributes\FilesAttributes;
use App\Domain\Core\Front\Admin\Form\Traits\AttachNested;
use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaManyTrait;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\CreditProduct\Entity\MainCredit;
use App\Domain\Currency\Traits\ConvertToSum;
use App\Domain\Product\Color\Entities\ProductMainColor;
use App\Domain\Product\Header\Entities\HeaderBody;
use App\Domain\Product\HeaderComponent\Header\Entities\HeaderComponent;
use App\Domain\Product\HeaderTable\Entities\HeaderTable;
use App\Domain\Product\HeaderText\Entities\HeaderText;
use App\Domain\Product\Images\Entities\Image;
use App\Domain\Product\Product\Builders\ProductBuilder;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use App\Domain\Shop\Entities\Shop;
use App\Domain\User\Entities\User;
use CardImages;

use ProductStats;

class Product extends Entity implements ProductInterface
{
    use Translatable, Sluggable, MediaManyTrait, ConvertToSum, AttachNested;

    public $guarded = [];
    protected $table = "products";

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }

    public function colors()
    {
        return $this->hasMany(ProductMainColor::class, "product_id");
    }

    public function description(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductDescription::class, "product_id");
    }

    public function bodies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderBody::class, "product_id");
    }

    public function getBodyFirstAttribute()
    {
        return $this->bodies()->first()->header;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, "shop_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function user_favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "favourites");
    }

    public function acceptMainCredit($id, $status)
    {
        $this->attachedManyNested($id, self::MAIN_CREDIT_SERVICE);
    }

    public function setProductOfDayAttribute($value)
    {
        $this->productDay()->attach($value);
    }

    public function productDay()
    {
        return $this->hasOne(ProductOfDay::class, "product_id");
    }

    public function mainCredit()
    {
        return $this->belongsToMany(MainCredit::class,
            "product_credits",
            "product_id",
            "main_credit_id"
        );
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
        return $this->hasOne(CardImage::class, 'product_id');
    }

    public function getRealPriceAttribute()
    {
        if ($this->currency == self::CURRENCY_USD_DB)
            return $this->convertToSum($this->price);
        return $this->price;
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


    public function productHit()
    {
        return $this->hasOne(ProductHit::class, "product_id");
    }

    public function setTitleAttribute($value)
    {
        $this->setTranslate('title', $value);
    }

    public function getTitleAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations('title');
    }

    public function getTitleCurrentAttribute(): ?string
    {
        return $this->getTranslatable('title');
    }


    public function slugSources(): array
    {
        return [
            'slug' => 'title'
        ];
    }

    public function getImagesAttribute()
    {
        return $this->getManyMedia("productImage", "image");
    }

    public function setImagesAttribute($value)
    {
        $this->setSaveManyMedia("productImage", $value, "image");
    }

    /*
     *  it is being here to reduce amount of work to do
     *  the upload function is used in the service
     * **/
    public function getImageProductAttribute(): FilesAttributes
    {
        return new FilesAttributes($this,
            "images",
            "product_1",
            Image::class,
            "image",
            "product_id");
    }

}

