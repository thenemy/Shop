<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

abstract class BaseAttributeFromText extends BaseAttributeForm
{
    public string $type;

    public function __construct(string $key, string $type)
    {
        parent::__construct($key);
        $this->type = $type;
    }
}
