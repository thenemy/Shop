<?php

namespace App\View\Helper\DropDown\Interfaces;


use App\View\Helper\DropDown\Items\DropItemLivewire;

interface TranslateDropDownInterface
{
    static public function toArray(DropDown $drop_down): array;

    static public function toDropDown(array $array_drop_down):DropDownLivewire;
}
