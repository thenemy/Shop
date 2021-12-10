<?php

namespace App\Domain\Category\Entities;

use App\Domain\Category\Builders\FiltrationCategoryBuilder;
use App\Domain\Category\Interfaces\FiltrationInterface;
use App\Domain\Core\Main\Entities\Entity;

class FiltrationCategory extends Entity implements FiltrationInterface
{
    protected $table = "filtration_category";

    public function newEloquentBuilder($query): FiltrationCategoryBuilder
    {
        return new FiltrationCategoryBuilder($query);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public static function getRules(): array
    {
        return [
            'key' => "required",
            'attribute' => 'required',
        ];
    }
}
