<?php


namespace App\Domain\Category\Entities;


use App\Domain\Category\Builders\CategoryBuilder;
use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Models\Media;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Product\Product\Entities\Product;


class Category extends Entity
{
    use Translatable, Sluggable;

    public $guarded = [];
    protected $table = "categories";

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }

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

    public function childsCategory()
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    public function icon()
    {
        return $this->hasOne(IconCat::class, "id");
    }

    public function getIconMediaAttribute(): Media
    {
        if ($this->icon) {
            return $this->icon->icon;
        }
        return new Media("", "", $this->id);
    }

    public function setIconMediaAttribute($value)
    {
        $icon = new IconCat();
        if ($this->icon) {
            $icon = $this->icon;
        } else {
            $icon->id = $this->id;
        }
        $icon->icon = $value;
        $icon->save();
    }

    public function slugSources(): array
    {
        return [
            "slug" => "name"
        ];
    }

}
