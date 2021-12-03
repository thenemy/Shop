<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

abstract class BaseAttributeFromText extends BaseAttributeForm
{
    public string $type;
    protected string $create;
    public function __construct(string $key, string $type, string $label, bool $create = true)
    {
        parent::__construct($key, $label);
        $this->type = $type;
        $this->create = $create;
    }
}
