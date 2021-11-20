<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;
use App\Domain\Core\Front\Admin\DropDown\Models\DropDownOptional;
use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseLivewire extends Component
{
    use WithPagination;

    /*
   * @array
 */
    public $filterBy = [];
    public $search; // model
    public $paginate = 10; // drop_down
    public $checkBox = []; // model
    public $keySearch = "search"; // set search

    public function checkAll()
    {
        $this->checkBox = $this->getLists()->pluck("id")->toArray();
    }

    public function removeAll()
    {
        $this->checkBox = [];
    }

    protected function getOptionalDropDown(): DropDownOptional
    {
        return new DropDownOptional(
            [
                new DropLivewireItem("0", __("Удалить все"), "deleteIn(0)"),
                ...$this->getItemsToOptionalDropDown()
            ]
        );

    }

    abstract protected function getItemsToOptionalDropDown(): array;

    protected function getLists()
    {
        $entity = $this->getEntity();
        return $entity::filterBy($this->filterBy)->paginate($this->paginate);
    }

    public function checkAllRemove()
    {

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setPaginate($number)
    {
        $this->paginate = $number;
    }

    public function deleteIn()
    {
//        $entity = $this->getEntity();
//        $entity::deleteIn($this->checkBox);
    }

    abstract protected function getTable();

    abstract protected function getEntity();

    public function setSearch($search)
    {
        $this->search = $search;
    }

    public function setKeySearch($keySearch)
    {
        $this->keySearch = $keySearch;
    }

    public function render()
    {
        $to_blade = $this->getVariable();
        $to_blade['optional'] = $this->getOptionalDropDown();
        return view($this->getPath(), $to_blade);
    }

    public function cleanFiler()
    {
        $this->filterBy = [];
    }

    public function includeOnlySearch()
    {
        $this->cleanFiler();
        $this->includeSearch();
    }

    public function includeSearch()
    {
        $this->filterBy[$this->keySearch] = $this->search;
    }

    abstract public function getPath();

    abstract public function getVariable();
}
