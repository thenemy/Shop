<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Interfaces\DropDownSearchInterface;
use App\Domain\Core\Front\Admin\DropDown\Traits\InitStaticDropFunction;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class BaseDropDownAttribute extends AbstractDropDown implements HtmlInterface
{
    use InitStaticDropFunction, AttributeGetVariable;

    public bool $create;

    public static function new(bool $create = true)
    {
        $self = get_called_class();
        $class = new $self([]);
        $class->create = $create;
        return $class;
    }

    public function generateHtml(): string
    {
        return sprintf("<x-helper.drop_down.drop_down :drop='%s'/>",
            $this->initGetDropDown(
                $this->create ? "" : $this->getWithoutScopeAtrVariable($this->key)
            ));
    }
}
