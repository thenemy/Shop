<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputAttribute extends BaseAttributeFromText
{
    public static function new(string $key, string $type, string $label)
    {

        return (new self($key, $type, $label, true))->generateHtml();
    }

    public static function createAttribute(string $key, string $type, string $label)
    {

        return new self($key, $type, $label, true);
    }

    public static function updateAttribute(string $key, string $type, string $label)
    {

        return new self($key, $type, $label, false);
    }

    public function generateHtml(): string
    {

        return sprintf("<x-helper.input.input name='%s' type='%s'  label='%s' value='%s'/>",
            $this->key,
            $this->type,
            $this->label,
            $this->create ? sprintf('{{old("%s") ?? ""}}', $this->key) : $this->getVariable(),
        );
    }
}
