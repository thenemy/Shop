<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputAttribute extends BaseAttributeFromText
{

    public function generateHtml(): string
    {

        return sprintf("<x-helper.input.input name='%s' type='%s'  label='%s' value='%s'/>",
            $this->key,
            $this->type,
            $this->label,
          $this->create ? "" : $this->getVariable(),
        );
    }
}
