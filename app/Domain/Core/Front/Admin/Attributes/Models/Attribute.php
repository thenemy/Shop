<?php

namespace App\Domain\Core\Front\Admin\Attributes\Models;
// attributes are needed so we can create
class Attribute
{
    public $type;
    public $column_name;
    public $value;

    public function __construct($type, $column_name, $value)
    {
        $this->type = $type;
        $this->column_name = $column_name;
        $this->value = $value ?? "";
    }


}
///
///  column_name key_value
///
