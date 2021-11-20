<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\Category;  // 1

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;
//2
class CategoryIndex extends BaseLivewire
{

    public $selected_value;  public function newClass($test){
        $this->selected_value=$test;
    } //3
    public function getPath()
    {
        return 'livewire.admin.pages.category.category-index'; //4
    }

    public function getVariable()
    {
        $this->includeSearch();
        $table = $this->getTable();
        $entity = $this->getEntity();
        return [
            "table" => new $table($entity::filterBy($this->filterBy)->paginate($this->paginate)),
             
'name_blade' => \App\Domain\Core\Front\Admin\DropDown\Models\Paginator\PaginatorDropDown::getDropDown($this->selected_value), //5
        ];
    }

    public function getTable(){
        return 'App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable'; //6
    }

    public function getEntity(){
        return 'App\Domain\Category\Front\Models\CategoryIndex'; //7
    }



}
