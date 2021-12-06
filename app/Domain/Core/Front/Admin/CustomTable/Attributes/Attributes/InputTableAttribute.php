<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\View\Components\Input\InputComponent;

class InputTableAttribute implements HtmlInterface
{
    public string $name;
    public string $type;
    public string $model;
    public string $key;

    public function __construct(string $name,
                                string $type,
                                string $model,
                                string $key = ""
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->model = $model;
        $this->key = $key;
    }

    public static function generate(string $name, string $type,
                                    string $model, string $key = ""): string
    {
        $self = new self($name, $type, $model, $key);
        return $self->generateHtml();
    }

    public function generateHtml(): string
    {
        $component = new InputComponent($this->name, $this->type, $this->model, $this->key);
        return $component->render()->with($component->data())->render();
    }
}
