<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Interfaces\HtmlInterface;
use function Symfony\Component\Translation\t;

class KeyTextAttribute implements HtmlInterface
{
    use AttributeGetVariable;

    private string $key;
    private string $value;

    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    static public function new(string $key, string $value): KeyTextAttribute
    {
        return new self($key, $value);
    }

    public function generateHtml(): string
    {
        return sprintf(
            "<x-helper.text.text_key key='%s' value='%s'></x-helper.text.text_key>",
            $this->key,
            $this->getAttributeVariable($this->value)
        );
    }
}
