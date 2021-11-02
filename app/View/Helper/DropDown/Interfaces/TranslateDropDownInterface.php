<?php

namespace App\View\Helper\DropDown\Interfaces;


use App\View\Helper\DropDown\Items\DropItemLivewire;
use App\View\Helper\DropDown\Models\Base\DropDown;

interface TranslateDropDownInterface
{
    static public function toArray(DropDownLivewire $drop_down): array;

    static public function toDropDown(array $array_drop_down): DropDownLivewire;
}
