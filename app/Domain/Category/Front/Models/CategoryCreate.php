<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\IconCat;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\FormAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class CategoryCreate extends Category implements FormAttributesInterface
{

    public function formAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new ImageAttribute($this, "icon_image")
        ]);
    }

    // move somewhere else
    public function setIconImageAttribute($value)
    {
        if ($this->icon) {
            $this->icon->icon = $value;
            $this->icon->save();
        } else {
            $icon = new IconCat();
            $icon->category()->associate($this->id);
            $icon->icon = $value;
            $icon->save();
        }
    }

}
