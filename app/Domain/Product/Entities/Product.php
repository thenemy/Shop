<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Models\User;
use App\Domain\Core\Main\Entities\Entity;

class Product extends Entity
{
    use Translatable, Sluggable;
    public $guarded = [];
    protected $table = "products";

    public function product()
    {
        return $this->belongsToMany(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->setTranslate('title', $value);
    }

    public function getTitleAttribute($value)
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
