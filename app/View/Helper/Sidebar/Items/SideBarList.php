<?php

namespace App\View\Helper\Sidebar\Items;

use App\View\Helper\Sidebar\Interfaces\SideBarInterface;

class SideBarList implements SideBarInterface
{
    public string $name;
    public array $sublist;

    public function __construct(array $sublist, $name = "")
    {
        $this->sublist = $sublist;
        $this->name = $name;
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
