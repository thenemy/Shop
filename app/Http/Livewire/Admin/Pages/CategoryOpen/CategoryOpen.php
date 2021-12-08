<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\CategoryOpen;  // 1  --- namespace

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;
//2 --- classname livewire
class CategoryOpen extends BaseLivewire
{

    public $selected_value;  public function newClass($test){$this->selected_value=$test;}

 public function activateChosen(){$this->getEntity()::whereIn('id', $this->checkBox)
            ->update(
                ['status' => true]
            );
        $this->checkBox = [];} public function deactivateChosenItem(){$this->getEntity()::whereIn('id', $this->checkBox)
            ->update(
                ['status' => false]
            );
        $this->checkBox = [];}
   public function statusTable($arg){$entity = $this->getEntity()::find($arg);
             $entity->status = !$entity->status;
             $entity->save();}  //3   --- set of functions and variables
    public function getPath()
    {
        return 'livewire.admin.pages.category-open.category-open'; //4  --- path to blade
    }

    public function getVariable()
    {
        $this->includeSearch();
        $table = $this->getTable();
        return [
            "table" => new $table($this->getLists()),
             
'name_blade' => \App\Domain\Core\Front\Admin\DropDown\Models\Paginator\PaginatorDropDown::getDropDown($this->selected_value) //5   --- variable to blade
        ];
    }
    public function getItemsToOptionalDropDown():array{
        return [
            new \App\Domain\Core\Front\Admin\DropDown\OptionalItems\DeactivateChooseItem(),new \App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem(), // 6  --- optional dropdown items
        ];
    }
    public function getTable(){
        return 'App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable'; //7  --- class name of table
    }

    public function getEntity(){
        return 'App\Domain\Category\Front\Opened\CategoryOpen'; //8  --- class name of entity
    }



}
