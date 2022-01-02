<?php

namespace App\Http\Livewire\Components\DropDown;

use Livewire\Component;

class DropDownSearch extends Component
{

    public string $search = "";
    public string $searchByKey = "";
    public string $dropDownClass = "";
    public string $initial = "";
    public string $searchLabel = "";
    public array $filterBy = [];

    public function render()
    {
        $this->dispatchBrowserEvent('search_event');
        $this->filterBy[$this->searchByKey] = $this->search;
        return view('livewire.components.drop-down.drop-down-search', [
            "drop" => $this->dropDownClass::getDropDownSearch($this->initial, $this->filterBy),
        ]);
    }
}
