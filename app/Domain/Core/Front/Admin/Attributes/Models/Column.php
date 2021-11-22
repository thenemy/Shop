<?php

namespace App\Domain\Core\Front\Admin\Attributes\Models;

class Column
{
    public string $column_name;
    public string $key_to_row;

    public function __construct($column_name, $key_to_row)
    {
        $this->column_name = $column_name;
        $this->key_to_row = $key_to_row;
    }
}