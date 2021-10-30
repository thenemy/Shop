<?php


namespace App\View\Helper\CustomList\Items;


class ListItems
{
    public $id;
    public $name;
    public $delete_route;
    public $edit_route;

    public function __construct($id, $name, $edit_route, $delete_route)
    {
        $this->id = $id;
        $this->name = $name;
        $this->edit_route = $edit_route;
        $this->delete_route = $delete_route;
    }
}
