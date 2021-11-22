<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;
use App\Domain\Core\Front\Admin\DropDown\Models\DropDownOptional;

/**
 * accepts @params
 *  $attachEntityId -- main entity which the other entities would be attached
 *  $keyToAttach    -- the key which must be called attach to main entity
 *  $attachEntity   -- attach entity class
 *  both passed in blade
 */
abstract class BaseLivewireNested extends BaseLivewire
{
    public bool $isAcceptMode = true;

    public $attachEntityId;
    public string $attachEntity;
    public string $keyToAttach;

    public function mount()
    {
        $this->filterBy["parent_id"] = $this->attachEntityId;
    }

    public function changeToAdd()
    {
        $this->isAcceptMode = true;
    }

    public function changeToRemove()
    {
        $this->isAcceptMode = false;
    }

    public function getTableToBlade()
    {
        if ($this->isAcceptMode) {
            return $this->getAcceptList();
        }
        return $this->getDeclineList();
    }

    public function getOptionalDropDown(): DropDownOptional
    {
        return new  DropDownOptional(
            $this->getItemsToOptionalDropDown()
        );
    }

    private function getAcceptList()
    {
        $table = $this->getTable();
        return new $table(parent::getLists());
    }

    private function getDeclineList()
    {
        $table = $this->getTableDecline();
        $entity = $this->getEntity();

        $withOutSearch = collect($this->filterBy);
        $filterBy = [$this->keySearch => $withOutSearch->pull($this->keySearch)];
        return new $table($entity::filterByNot($withOutSearch->toArray())->filterBy($filterBy)->paginate($this->paginate));
    }

    public function getItemsToOptionalDropDown(): array
    {
        if ($this->isAcceptMode) {
            return [
                new DropLivewireItem(__("Добавить все отмечанные"), "acceptAllChecked"),
                ...$this->getItmsToDropDownAccept()
            ];
        } else {
            return [
                new DropLivewireItem(__("Удалить все отмечанные"), "removeAllChecked"),
                ...$this->getItmsToDropDownDecline()
            ];
        }
    }

    abstract public function getItmsToDropDownAccept(): array;

    abstract public function getItmsToDropDownDecline(): array;

    public function acceptAllChecked()
    {
        $this->addToEntity($this->checkBox);
    }

    private function addToEntity($adding)
    {
        $entity = $this->getAttachEntity();
        $keyToAttach = $this->keyToAttach;
        $entity->$keyToAttach()->attach($adding);
    }

    private function removeFromEntity($adding)
    {
        $entity = $this->getAttachEntity();
        $keyToAttach = $this->keyToAttach;
        $entity->$keyToAttach()->detach($adding);
    }

    public function removeAllChecked()
    {
        $this->removeFromEntity($this->checkBox);
    }

    public function removeSpecific($id)
    {
        $this->removeFromEntity($id);
    }

    public function addSpecific($id)
    {
        $this->addToEntity($id);
    }

    private function getAttachEntity()
    {
        return $this->attachEntity::find($this->attachEntityId);
    }

    // use traits to reduce redundancy of code;
    abstract public function getTableDecline(): string;


}
