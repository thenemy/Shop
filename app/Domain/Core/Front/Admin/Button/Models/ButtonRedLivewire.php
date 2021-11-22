<?php

namespace App\Domain\Core\Front\Admin\Button\Models;

class ButtonRedLivewire extends ButtonLivewire
{
    public function __construct($name, $clicked)
    {
        parent::__construct($name, $clicked, "bg-red-600 hover:bg-red-400");
    }
}
