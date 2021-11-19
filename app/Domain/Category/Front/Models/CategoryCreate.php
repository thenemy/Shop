<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\IconCat;
use App\Domain\Core\Front\Admin\Attributes\Models\AttributeText;
use App\Domain\Core\Front\Admin\Form\Interfaces\FrontAttributesInterface;

class CategoryCreate extends Category implements FrontAttributesInterface
{
    static public function generateEntity()
    {
        return new self();
    }

    public function formAttributes(): array
    {
        return [
            new AttributeText('', "name", "", "", ""),
        ];
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
