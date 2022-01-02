<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

abstract class BaseAttributeFromText extends BaseAttributeForm
{


    public string $type;
    public string $dispatch;

    public function createDispatch(): string
    {
        if ($this->dispatch) {
            return sprintf('$dispatch(\'%s\', {
               data:{
                    value: event.target.value
               }
            })', $this->dispatch);
        }
        return "";

    }

    public static function new(string $key, string $type, string $label, string $id = "", string $dispatch = "")
    {
        $self = get_called_class();
        return (new $self($key, $type, $label, true, $id, $dispatch))->generateHtml();
    }


    public static function createAttribute(string $key, string $type, string $label, string $id = "", string $dispatch = "")
    {
        $self = get_called_class();
        return new $self($key, $type, $label, true, $id, $dispatch);
    }

    public static function updateAttribute(string $key, string $type, string $label, string $id = "", string $dispatch = "")
    {
        $self = get_called_class();
        return new $self($key, $type, $label, false, $id, $dispatch);
    }

    public function __construct(string $key, string $type, string $label, bool $create = true, $id = "", string $dispatch = "")
    {
        parent::__construct($key, $label, $create, $id,);
        $this->type = $type;
        $this->dispatch = $dispatch;
    }
}
