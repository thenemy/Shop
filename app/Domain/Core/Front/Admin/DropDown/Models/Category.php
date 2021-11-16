<?php


namespace App\View\Helper\DropDown\Models;


use App\Domain\Core\Language\Interfaces\LanguageInterface;
use App\View\Helper\DropDown\Interfaces\DropDownInterface;
use App\View\Helper\DropDown\Interfaces\DropDownLivewireInterface;
use App\View\Helper\DropDown\Items\DropItem;
use App\View\Helper\DropDown\Items\DropItemLivewire;
use App\View\Helper\DropDown\Models\Base\CategoryDropDown;
use App\View\Helper\DropDown\Models\Base\DropDown;

class Category implements DropDownLivewireInterface, DropDownInterface
{

    static public function getDropDownLivewire(): array
    {
        return [
            new CategoryDropDown(
                Category::all()->map(function ($item) {
                    return DropItemLivewire::create_text($item->id, $item->name, self::class);
                })->all()
            )
        ];
    }

    static public function getDropDown(): DropDown
    {
        return new CategoryDropDown(
            Category::all()->map(function ($item) {
                return new DropItem($item->id, $item->name);
            })->all()
        );
    }
}
