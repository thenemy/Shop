<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;


use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;
use App\View\Components\Actions\DeleteAction;

class IconsAttribute extends BaseAttributes
{

    public function generateHtml():string
    {
        $icon = new DeleteAction($this->getValueOfMainKey());
        return $icon->render()->with($icon->data());
    }
}
