<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputAttribute extends BaseAttributeFromText
{


    public function generateHtml(): string
    {
        if ($this->type == "checkbox") {
            $dispatch = sprintf('onchange="%s"', $this->createDispatch());
        } else {
            $dispatch = sprintf("onkeyup=\"%s\"", $this->createDispatch());
        }
        return sprintf("<x-helper.input.input name='%s' type='%s'
            label='%s' value='%s' id='%s'  %s/>",
            $this->key,
            $this->type,
            $this->label,
            $this->create ? sprintf('{{old("%s") ?? ""}}', $this->key) : $this->getVariable(),
            $this->id,
            $dispatch
        );
    }
}
