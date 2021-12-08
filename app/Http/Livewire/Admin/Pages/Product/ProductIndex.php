<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\Product;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;
//2 --- classname livewire
class ProductIndex extends BaseLivewire
{

    


       //3   --- set of functions and variables
    public function getPath()
    {
        return 'livewire.admin.pages.product.product-index'; //4  --- path to blade
    }

    public function getVariable()
    {
        $this->includeSearch();
        $table = $this->getTable();
        return [
            "table" => new $table($this->getLists()),
              //5   --- variable to blade
        ];
    }
    public function getItemsToOptionalDropDown():array{
        return [
             // 6  --- optional dropdown items
        ];
    }
    public function getTable(){
        return 'App\Domain\Product\Product\Front\Admin\CustomTable\Tables\ProductTable'; //7  --- class name of table
    }

    public function getEntity(){
        return 'App\Domain\Product\Product\Front\Main\ProductIndex'; //8  --- class name of entity
    }



}
