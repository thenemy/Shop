<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Traits;

trait SetInputAttribute
{
    static private function filter(): int
    {
        return 1;
    }

    static private function defer(): int
    {
        return 2;
    }

    /*
     * could return true for defer
     * return string for filter
     * */
    public static function setInputAttr($key, $type)
    {
    }

}
