<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\ProductCreate;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireNestedWithoutEntity;

//2 --- classname livewire
class MainCreditNested extends BaseLivewireNestedWithoutEntity
{

    

 public function activateChosen(){$this->getEntity()::whereIn('id', $this->checkBox)
            ->update(
                ['status' => true]
            );
        $this->checkBox = [];}
     //3   --- set of functions and variables
    public function getPath()
    {
        return 'livewire.admin.pages.product-create.main-credit-nested'; //4  --- path to blade
    }

    public function getVariable()
    {
        $this->includeSearch();
        return [
            "table" => $this->getTableToBlade(),
              //5   --- variable to blade
        ];
    }

    public function getItmsToDropDownAccept():array{
        return [
            new \App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem(), //6   --- accept optional dropdown
        ];
    }

    public function getItmsToDropDownDecline():array{
        return [
             //7   --- decline optional dropdown
        ];
    }

    public function getTable(){
        return 'App\Domain\CreditProduct\Front\Admin\Table\MainCreditNestedAcceptTable'; //8  --- class name of table
    }

    public function getEntity(){
        return 'App\Domain\CreditProduct\Front\Nested\MainCreditNested'; //9  --- class name of entity
    }


    public function getTableDecline():string {
        return 'App\Domain\CreditProduct\Front\Admin\Table\MainCreditNestedDeclineTable';  //10  --- class of table to decline
    }
}
