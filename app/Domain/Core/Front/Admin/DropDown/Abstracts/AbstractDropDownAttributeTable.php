<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseDropDownAttribute;
use App\View\Components\DropDown\DropDownComponent;

abstract class AbstractDropDownAttributeTable extends BaseDropDownAttribute
{
    public string $model;

    public function __construct(array $items, $model, $name = null)
    {
        $this->model = $model;
        parent::__construct($items, $name);
    }

    static public function getDropDown($name = null): AbstractDropDown
    {
        // TODO: Implement getDropDown() method.
    }

    abstract static public function generate($model, $name = null);

    public function generateHtml(): string
    {
        $drop = new DropDownComponent($this, [
            'wire:model' => $this->model . $this->key,
            'wire:key' => $this->key . '__' . 'drop_down'
        ]);
        return $drop->render()->with($drop->data())->render();
    }

    public function getAdditionalAttributeToHtml(): string
    {
        return sprintf(
            'wire:model=%s  wire:key=%s',
            $this->getModel() . $this->key,
            $this->key . '__' . 'drop_down'
        );
    }
}
