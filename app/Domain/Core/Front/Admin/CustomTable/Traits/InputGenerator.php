<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;

trait InputGenerator
{
    protected function generateInput(array $rules, string $model)
    {
        $inputs = [];
        foreach ($rules as $key => $rule) {
            $is_numeric = false;

            foreach (explode("|", $rule) as $item) {
                if ($item == "numeric") {
                    $is_numeric = true;
                    break;
                }
            }

            $inputs[$key] = InputTableAttribute::generate(
                $key,
                !$is_numeric ? "text" : "number",
                $model . $key);
        }
        return $inputs;
    }

}
