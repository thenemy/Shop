<?php

namespace App\Domain\Core\Front\Admin\Button\ModelInCompelationTime;

class RedButtonCompile extends BaseButtonCompile
{
    static public function new($name, $attributes = [])
    {
        $standard = [
            'class' => "bg-red-600 hover:bg-red-400"
        ];
        return parent::new($name, array_merge($standard, $attributes)); // TODO: Change the autogenerated stub
    }
}
