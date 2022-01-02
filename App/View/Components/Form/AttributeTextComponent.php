<?php

namespace App\View\Components\Form;

use App\View\Components\Base\BaseFormComponent;

class AttributeTextComponent extends BaseFormComponent
{

    protected function getPathToComponent(): string
    {
        return "components.helper.input.input";
    }
}
