<?php

namespace App\Domain\Core\Front\Admin\Button\ModelInCompelationTime;

class MainButtonCompile extends BaseButtonCompile
{
    static public function new($name, $attributes = [])
    {
        $standard = [
            'class' => "bg-blue-600 hover:bg-blue-400"
        ];
        return parent::new($name, array_merge($standard, $attributes)); // TODO: Change the autogenerated stub
    }
}
