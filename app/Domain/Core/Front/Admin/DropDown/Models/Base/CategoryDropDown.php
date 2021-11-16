<?php

namespace App\View\Helper\DropDown\Models\Base;

class CategoryDropDown extends DropDown
{

    function setType(): string
    {
        return "type";
    }

    function setKey(): string
    {
        return 'number';
    }

    function setName(): string
    {
        return 'Тип баннера';
    }
}
