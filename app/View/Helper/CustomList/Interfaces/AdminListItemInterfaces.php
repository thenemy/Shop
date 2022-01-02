<?php


namespace App\View\Helper\CustomList\Interfaces;


interface AdminListItemInterfaces
{
    static public function getListItems( $items, string $delete, string $update): array;
}
