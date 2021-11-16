<?php


namespace App\Domain\Category\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Product\Product\Entities\Product;


class Category extends Entity
{
    use Translatable, Sluggable;

    public $guarded = [];
    protected $table = "categories";

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value): ?string
    {
        return $this->getTranslatable("name");
    }

    public function setNameAttribute($value)
    {
        $this->setTranslate("name", $value);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, "parent_id");
    }

    public function icon()
    {
        return $this->hasOne(IconCat::class);
    }

    public function slugSources(): array
    {
        return [
            "slug" => "name"
        ];
    }

}
