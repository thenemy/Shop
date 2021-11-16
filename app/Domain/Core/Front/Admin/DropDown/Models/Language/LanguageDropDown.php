<?php


namespace App\View\Helper\DropDown\Models\Language;


use App\Domain\Core\Language\Interfaces\LanguageInterface;

use App\View\Helper\DropDown\Interfaces\DropDownInterface;
use App\View\Helper\DropDown\Interfaces\DropDownLivewireInterface;
use App\View\Helper\DropDown\Items\DropItem;
use App\View\Helper\DropDown\Items\DropItemLivewire;
use App\View\Helper\DropDown\Models\Base\DropDown;

class LanguageDropDown implements DropDownLivewireInterface, DropDownInterface
{

    static public function getDropDownLivewire(): array
{
    return [
        new DropDown(
            (string)[
                new DropItemLivewire(LanguageInterface::RUSSIAN, "Руский", self::class),
                new DropItemLivewire(LanguageInterface::ENGLISH, "English", self::class),
                new DropItemLivewire(LanguageInterface::UZBEK, "Uzbek", self::class)
            ]
        )
    ];
}

    static public function getDropDown(): DropDown
{
    return new DropDown(
        (string)[
            new DropItem(LanguageInterface::RUSSIAN, "Руский"),
            new DropItem(LanguageInterface::ENGLISH, "English"),
            new DropItem(LanguageInterface::UZBEK, "Uzbek")
        ]
    );
}
}
