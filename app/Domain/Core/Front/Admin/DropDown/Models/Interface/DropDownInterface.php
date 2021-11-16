<?php

namespace App\View\Helper\DropDown\Interfaces;

use App\View\Helper\DropDown\Models\Base\DropDown;


interface DropDownInterface
{

    static public function getDropDown(): DropDown;
}

