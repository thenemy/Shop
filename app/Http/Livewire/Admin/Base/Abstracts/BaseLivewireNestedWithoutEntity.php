<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

abstract class BaseLivewireNestedWithoutEntity extends BaseLivewireNested
{
    public array $addedCheckBox = [];

    public function getLists()
    {
        $entity = $this->getEntity();
        return $entity::filterBy(['id' => $this->addedCheckBox])->paginate($this->paginate);
    }

    protected function getListAccept()
    {
        $entity = $this->getEntity();
        $withOutSearch = collect($this->filterBy);
        $filterBy = [$this->keySearch => $withOutSearch->pull($this->keySearch)];
        return $entity::filterByNot(['id' => $this->addedCheckBox])
            ->filterBy($filterBy)
            ->paginate($this->paginate);
    }

    protected function addToEntity($adding)
    {
        if (gettype($adding) == "array") {
            $this->addedCheckBox = array_merge_recursive_distinct($adding, $this->addedCheckBox);
        } else if (!in_array($adding, $this->addedCheckBox, true)) {
            array_push($this->addedCheckBox, $adding);
        }
    }

    protected function removeFromEntity($adding)
    {
        $values = $adding;
        if (gettype($adding) != "array") {
            $values = [];
            array_push($values, $adding);
        }
        $this->addedCheckBox = array_diff($this->addedCheckBox, $values);
    }

}
