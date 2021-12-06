<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

abstract class BaseAttributeFromText extends BaseAttributeForm
{
    public string $type;

    public static function new(string $key, string $type, string $label)
    {
        $self = get_called_class();
        return (new $self($key, $type, $label, true))->generateHtml();
    }


    public static function createAttribute(string $key, string $type, string $label)
    {
        $self = get_called_class();
        return new $self($key, $type, $label, true);
    }

    public static function updateAttribute(string $key, string $type, string $label)
    {
        $self = get_called_class();
        return new $self($key, $type, $label, false);
    }

    public function __construct(string $key, string $type, string $label, bool $create = true)
    {
        parent::__construct($key, $label, $create);
        $this->type = $type;
    }
}
