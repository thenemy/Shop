<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputAttribute extends BaseAttributeFromText
{

    private function getValue()
    {
        if ($this->type == "password") {
            return "";
        }
        return sprintf('{{old("%s") ?? %s}}', $this->key, $this->getVariable());
    }

    // change dispatches depending on type
    public function generateHtml(): string
    {
        if ($this->type == "checkbox") {
            $dispatch = sprintf('onchange="%s"', $this->createDispatch());
        } else {
            $dispatch = sprintf("onkeyup=\"%s\"", $this->createDispatch());
        }
        return sprintf("<x-helper.input.input%s name='%s' type='%s'
            label='{{__(\"%s\")}}' value='%s' id='%s'  %s/>",
            $this->type == "checkbox" ? "_checked" : "",
            $this->key,
            $this->type,
            $this->label,
            $this->getValue(),
            $this->id,
            $dispatch
        );
    }
}
