<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\Category;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireNested;

//2 --- classname livewire
class CategoryNested extends BaseLivewireNested
{

    
 public function activateChosen(){$this->getEntity()::whereIn('id', $this->checkBox)
            ->update(
                ['status' => true]
            );
        $this->checkBox = [];}
   public function statusTable($arg){$entity = $this->getEntity()::find($arg);
             $entity->status = !$entity->status;
             $entity->save();}   //3   --- set of functions and variables
    public function getPath()
    {
        return 'livewire.admin.pages.category.category-nested'; //4  --- path to blade
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
        return 'App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryAcceptTable'; //8  --- class name of table
    }

    public function getEntity(){
        return 'App\Domain\Category\Front\Models\CategoryNested'; //9  --- class name of entity
    }


    public function getTableDecline():string {
        return 'App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryDeclineTable';  //10  --- class of table to decline
    }
}
