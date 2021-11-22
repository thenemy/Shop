<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;


use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;
use App\View\Components\Status\StatusComponent;

abstract class StatusAttribute extends BaseAttributes
{

    abstract public function color():string;

    abstract public function statusName():string;

    public function generateHtml()
    {
        $name = new StatusComponent($this->getValueOfMainKey(),$this->color());
        return $name->render()->with($name->data());
    }

}
