<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;
use App\Domain\Core\Front\Admin\DropDown\Models\DropDownOptional;
use App\Domain\Core\Front\Admin\DropDown\Models\PaginatorDefault;
use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseLivewire extends Component
{
    use WithPagination;

    /*
   * @array
 */
    public array $filterBy = [];
    public string $search = ""; // model
    public $paginate = 10; // drop_down
    public array $checkBox = []; // model
    public string $keySearch = "search"; // set search

    public function checkAll()
    {
        $this->checkBox = $this->getLists()->pluck("id")->toArray();
    }

    public function removeAll()
    {
        $this->checkBox = [];
    }

    public function getOptionalDropDown(): DropDownOptional
    {
        return new DropDownOptional(
            [
                new DropLivewireItem(__("Удалить выбранные"), "deleteIn()"),
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


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function setPaginate($number)
    {
        $this->paginate = $number;
    }

    public function deleteIn()
    {
        $entity = $this->getEntity();
        $entity::deleteIn($this->checkBox);
    }


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
        $this->dispatchBrowserEvent('table_check');
        $to_blade = $this->getVariable();
        $to_blade['optional'] = $this->getOptionalDropDown();
        $to_blade["paginator"] = PaginatorDefault::getDropDown();
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

    abstract protected function getTable();

    abstract protected function getEntity();
}
