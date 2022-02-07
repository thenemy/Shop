<?php

namespace App\Domain\Core\Front\Admin\Button\ModelInCompelationTime;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class ButtonDaisy extends BaseButtonCompile
{
    public static function new($name, $attributes = [])
    {
        return parent::new($name, self::append([
            'class' => "btn "
        ], $attributes));
    }

    public function generateHtml(): string
    {
        return sprintf(
            "<button %s>{{__('%s')}}</button>",
            $this->generateAttributes(),
            $this->name);
    }
}
