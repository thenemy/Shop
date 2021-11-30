<?php

namespace App\Domain\Category\Front\Traits;

use App\Domain\Category\Front\Admin\Path\CategoryOpenRouteHandler;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\OpenAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\StatusAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;

trait CategoryAttributeTable
{
    public function getIconTableAttribute(): string
    {
        return ImageAttribute::preGenerate($this, 'icon_value');
    }

    public function getIconValueAttribute(): string
    {
        return "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/How_to_use_icon.svg/1200px-How_to_use_icon.svg.png";
    }

    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }

    public function getStatusTableAttribute(): string
    {
        return (new StatusAttribute($this, "status", "statusTable"))
            ->generateHtml();
    }


    // get Open button with all required data
    public function getUnderCategoryTableAttribute()
    {

        return (new OpenAttribute(CategoryOpenRouteHandler::new(), $this, $this->childsCategory()->count()
        ))->generateHtml();
    }
}
