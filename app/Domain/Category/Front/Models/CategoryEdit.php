<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;
use App\Domain\Core\File\Models\FileLivewireNested;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\FormAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class CategoryEdit extends Category implements FormAttributesInterface
{
    // can call as i want , but when I create name must be type correctly
    public function formAttributes(): BladeGenerator
    {
        return BladeGenerator::generation(array(
            new FileLivewireNested("Category", $this->child_category),
            new ImageAttribute($this, "icon_image")
        ));
    }

    public function getChildCategoryAttribute(): CategoryNested
    {
        return new CategoryNested([],
            "attachCategory",
            "Категории");
    }

    public function attachCategory($id)
    {

    }

}
