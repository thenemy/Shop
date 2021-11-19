<?php

namespace App\Domain\Core\Front\Admin\Attributes\Models;
// attributes are needed so we can create

use App\Domain\Core\Front\Admin\Attributes\Interfaces\AttributeFormInterface;

class AttributeText implements AttributeFormInterface
{
    private $html_component;
    private $column_name;
    private $value;
    private $type;

    public function __construct($html_component, $column_name, $value, $type)
    {
        $this->html_component = $html_component;
        $this->column_name = $column_name;
        $this->value = $value ?? "";
        $this->type = $type;
    }

    public function generateHtml(): string
    {
        return sprintf($this->html_component, $this->type, $this->column_name, $this->value);
    }
}
///
///  column_name key_value
///
