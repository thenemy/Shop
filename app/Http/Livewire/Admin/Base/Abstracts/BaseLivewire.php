<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

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
        $entity = $this->getEntity();
        $entity::deleteIn($this->checkBox);
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
        return view($this->getPath(), $this->getVariable());
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
