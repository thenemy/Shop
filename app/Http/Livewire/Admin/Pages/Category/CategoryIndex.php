<?php
// namespace  will start with
namespace App\Http\Livewire\Admin\Pages\Category;

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;

class CategoryIndex extends BaseLivewire
{
    public $selectedValue;
    public $mustAlways;

    public function getPath()
    {
        return 'livewire.admin.pages.category.category-index';
    }

    public function getVariable()
    {
        $this->includeSearch();
        $table = $this->getTable();
        $entity = $this->getEntity();
        return [
            "table" => new $table($entity::filterBy($this->filterBy)->paginate($this->paginate)),
            "notPaginator" => \App\Domain\Core\Front\Admin\DropDown\Models\Paginator\PaginatorDropDown
                ::getDropDown($this->selectedValue)
        ];
    }

    public function getTable()
    {
        return 'App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable';
    }

    public function getEntity()
    {
        return \App\Domain\Category\Front\Models\CategoryIndex::class;
    }


    public function newClass($test)
    {
        $this->selectedValue = $test;
    }


}
