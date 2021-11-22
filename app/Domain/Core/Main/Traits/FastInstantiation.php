<?php

namespace App\Domain\Core\Main\Traits;

trait FastInstantiation
{
    static private function newClass(string $class)
    {
        return new $class();
    }
}
