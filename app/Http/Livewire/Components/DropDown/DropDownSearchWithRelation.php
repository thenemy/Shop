<?php

namespace App\Http\Livewire\Components\DropDown;

use App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch;
use Livewire\Component;

/**
 * initial must be id of the child
 * so we could reach for the initial of child and parent
 *
 */
class DropDownSearchWithRelation extends DropDownSearch
{
    public string $dropDownAssociatedClass;
    public array $filterByAssociated = [];
    public string $dispatchClass = Dispatch::class;
    public $parentInitial;

    public function setParent($id)
    {
        $this->parentInitial = $id;
        $this->filterByAssociated[$this->dropDownAssociatedClass::parentKey()] = $id;
    }

    public function setChild($id)
    {
        $this->initial = $id;
        $this->dispatchClass::run($this);
    }

    public function render()
    {
        $this->dispatchBrowserEvent('search_event');
        $this->filterBy[$this->searchByKey] = $this->search;
        return view('livewire.components.drop-down.drop-down-search-with-relation',
            [
                "drop" => $this->dropDownClass::getDropDownSearch($this->parentInitial,
                    $this->filterBy),
                "drop_associated" => $this->dropDownAssociatedClass::getDropDownParent($this->initial,
                    $this->filterByAssociated)
            ]);
    }
}
