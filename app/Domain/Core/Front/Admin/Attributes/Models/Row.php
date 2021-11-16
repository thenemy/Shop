<?php

namespace App\Domain\Core\Front\Admin\Attributes\Models;
// can not instantiate at that level because of the lack data
//
//
//  [
//    "key_to_row" => new Row( $name, $class_name),
//
//  ]
//  share the entity to implement the class in the constructor
//

class Row
{
    public $name;
    public $class_name; // if it exists instantiate this method , if it is not just call entity method

    public function __construct($name , $class_name="")
    {
        $this->name = $name;
        $this->class_name = $class_name;
    }
}
