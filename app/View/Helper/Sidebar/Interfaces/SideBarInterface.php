<?php


namespace App\View\Helper\Sidebar\Interfaces;


interface SideBarInterface
{
    const LIST_SIDEBAR = 1;
    const USUAL_SIDEBAR = 0;

    public function getType();

    public function isCurrentRoute(): bool;
}
