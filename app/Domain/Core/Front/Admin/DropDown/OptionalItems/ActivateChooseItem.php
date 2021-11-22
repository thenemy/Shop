<?php

namespace App\Domain\Core\Front\Admin\DropDown\OptionalItems;

use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireOptional;

class ActivateChooseItem extends DropLivewireOptional
{
    static protected function getName(): string
    {
        return __("Активровать выбранные");
    }

    static public function getFunctionName(): string
    {
        return "activateChosen";
    }

    static public function getArguments(): array
    {
        return [];
    }
}
