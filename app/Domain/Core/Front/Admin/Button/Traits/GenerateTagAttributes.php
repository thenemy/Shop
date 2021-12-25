<?php

namespace App\Domain\Core\Front\Admin\Button\Traits;

trait GenerateTagAttributes
{
    private array $attributes = [];

    /**
     * @return string
     */
    private function generateAttributes(): string
    {
        $str = "";
        foreach ($this->attributes as $key => $attribute) {
            $str = sprintf("%s\t%s='%s'", $str, $key, $attribute);
        }
        return $str;
    }
}
