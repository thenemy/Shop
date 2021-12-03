<?php

namespace App\Domain\Core\Front\Admin\DropDown\Traits;

trait InitStaticDropFunction
{
    protected function initGetDropDown($value): string
    {
        return $this->getDropDowInitial(get_called_class(), $value);
//        return "\\" . get_called_class() . "::" . "getDropDown(" . $value . "),";
    }

    public function getDropDownInit($class, $value): string
    {
        return $this->getDropDowInitial($class, $value) . ",";
    }

    private function getDropDowInitial($class, $value): string
    {
        return '\\' . $class . "::" . "getDropDown(" . $value . ")";
    }
}
