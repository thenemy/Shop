<?php

namespace App\Domain\Core\Front\Admin\Button\Traits;

trait GenerateTagAttributes
{
    protected array $attributes = [];

    static protected function append(array $attribute, array $append): array
    {
        foreach ($attribute as $key => $value) {
            $append_value = "";
            if (isset($append[$key])) {
                $append_value = $append[$key];
                unset($append[$key]);
            }
            $attribute[$key] = $value .' ' . $append_value;
        }
        return array_merge($attribute, $append);
    }

    /**
     * @return string
     */
    protected function generateAttributes(): string
    {
        $str = "";
        foreach ($this->attributes as $key => $attribute) {
            $str = sprintf("%s\t%s='%s'", $str, $key, $attribute);
        }
        return $str;
    }
}
