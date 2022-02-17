<?php

namespace App\Domain\Category\Api;

use App\Domain\Category\Entities\Category;

class CategoryInMain extends Category
{
    public function parentCategory()
    {
        return $this->belongsTo(CategoryInMain::class, "parent_id");
    }

    public function childsCategory()
    {
        return $this->hasMany(CategoryInMain::class, "parent_id");
    }

    public function parent()
    {
        return $this->belongsTo(CategoryInMain::class, "parent_id");
    }

    public function toArray()
    {
        return [
            "name" => $this->getNameCurrentAttribute(),
            "slug" => $this->slug,
            "image" => $this->icon->image->fullPath(),
        ];
    }
}
