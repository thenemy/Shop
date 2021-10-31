<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Product\Entities\HeaderComponent\Header\Entities\HeaderComponent;
use App\Domain\Product\Entities\HeaderTable\Entities\HeaderTable;
use App\Domain\Product\Entities\HeaderText\Entitites\HeaderText;
use App\Domain\Product\Entities\Images\Entities\CardImages;
use App\Domain\ProductKey\Entities\Key;
use App\Models\User;
use App\Domain\Core\Main\Entities\Entity;
use Discounts;
use ProductStats;

class Product extends Entity
{
    use Translatable, Sluggable;

    public $guarded = [];
    protected $table = "products";

    public function user_favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "favourites");
    }

    public function productProductStatus(){
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
        return $this->hasMany(Key::class, 'product_id');
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

    public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }

    public function livewireComponents(): array
    {
        // TODO: Implement livewireComponents() method.
    }

    public function getTableRows(): array
    {
        // TODO: Implement getTableRows() method.
    }
}
