<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Traits\SetInputAttribute;

trait InputGenerator
{
    use SetInputAttribute;

    protected function generateInput(array $rules, string $model = 'entity.')
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
                $model . $key,
                "input_table_" . $key,
                $this->setInputAttr($key, self::defer()),
                $this->setInputAttr($key, self::filter())
            );
        }
        return $inputs;
    }

}
