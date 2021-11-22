<?php

namespace App\Domain\Core\Front\Admin\Button\Models;

class ButtonGreenLivewire extends ButtonLivewire
{
    public function __construct($name, $clicked)
    {
        parent::__construct($name, $clicked, "bg-green-600 hover:bg-green-400");
    }
}
