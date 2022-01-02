<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;


use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeForm;

class TextAreaAttribute extends BaseAttributeForm
{

    public function generateHtml(): string
    {
        return sprintf("<x-helper.text_area.text_area name='%s' label='%s'>{{%s}}</x-helper.text_area.text_area>",
            $this->key,
            $this->label,
            sprintf('old("%s") ?? %s', $this->key, $this->getVariable())
        );
    }
}
