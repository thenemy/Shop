<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Attributes;


use App\Domain\Category\Front\Admin\CustomTable\Action\Models\CategoryAcceptAction;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces\AttributesInterface;

class CategoryAttributes extends AbstractAttributes
{

    public function getAttributes($entity): array
    {
        return [
            new ImageAttribute($entity->icon, "icon"),
            new TextAttribute($entity, "name"),
        ];
    }


    public function getActions($entity): array
    {
        return [
            new CategoryAcceptAction()
        ];
    }
}
