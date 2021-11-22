<?php

namespace App\Domain\Category\Front\Traits;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;

trait CategoryAttributeTable
{
    public function getIconTableAttribute(): string
    {
        return ImageAttribute::preGenerate($this, 'icon_value');
    }

    public function getIconValueAttribute(): string
    {
        return "https://";
    }

    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }

    public function getStatusTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }



    // get Open button with all required data
    public function getUnderCategoryTableAttribute()
    {
        return TextAttribute::preGenerate($this, "name");
    }
}
