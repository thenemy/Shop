<?php

namespace App\View\Helper\Sidebar\Items;

use App\View\Helper\Sidebar\Interfaces\SideBarInterface;

class SideBarList implements SideBarInterface
{
    public string $name;
    public array $sublist;
    public string $icon;

    public function __construct(array $sublist, $name = "", $icon = "")
    {
        $this->sublist = $sublist;
        $this->name = $name;
        $this->icon = $icon;
    }


    public function getType(): int
    {
        return self::LIST_SIDEBAR;
    }

    public function isCurrentRoute(): bool
    {
        foreach ($this->sublist as $item) {
            if ($item->isCurrentRoute()) {
                return true;
            }
        }
        return false;
    }
}
