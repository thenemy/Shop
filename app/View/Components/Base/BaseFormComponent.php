<?php

namespace App\View\Components\Base;

abstract class BaseFormComponent extends BaseComponent
{
    public string $key;
    public string $type;

    public function __construct(string $type, string $key, $slot)
    {
        $this->type = $type;
        $this->key = $key;
        parent::__construct($slot);
    }
}
