<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;


use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeForm;

class TextAreaAttribute extends BaseAttributeForm
{

    public function generateHtml(): string
    {
        return sprintf("<x-helper.text_area.text_area name='%s'>%s</x-helper.text_area.text_area>",
            $this->key,
            $this->getVariable()
        );
    }
}
