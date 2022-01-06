<?php

namespace App\View\Components\Images;

use App\View\Components\Base\BaseComponent;

class ImageTableComponent extends BaseComponent
{

    public function __construct($slot)
    {
        parent::__construct($slot);
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.image.image";
    }
}
