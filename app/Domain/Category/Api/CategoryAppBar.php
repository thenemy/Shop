<?php

namespace App\Domain\Category\Api;

use App\Domain\Category\Entities\Category;

class CategoryAppBar extends Category
{
    public function parentCategory()
    {
        return $this->belongsTo(CategoryAppBar::class, "parent_id");
    }

    public function childsCategory()
    {
        return $this->hasMany(CategoryAppBar::class, "parent_id");
    }

    public function parent()
    {
        return $this->belongsTo(CategoryAppBar::class, "parent_id");
    }

    public function toArray()
    {
        return [
            "name" => $this->getNameCurrentAttribute(),
            "slug" => $this->slug,
            "child" => $this->childsCategory(),
        ];
    }
}
