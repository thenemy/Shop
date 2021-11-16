<?php


namespace App\View\Helper\DropDown\Models\Base;

 class DropDown extends AbstractDropDown
{
    public $name;
    public $key;
    public $type;
    public $items;

    public function __construct(string $items)
    {
        $this->key = $this->setKey();
        $this->type = $this->setType();
        $this->name = $this->setName();
        parent::__construct($items);

    }

     function setType():string
     {
        return $this->name;
     }

     function setKey():string
     {
         return $this->key;
     }

     function setName():string
     {
        return $this->name;
     }
 }
