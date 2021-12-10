<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Core\Main\Traits\FastInstantiation;
use Illuminate\Support\Collection;

/*
 * rules are not made
 * */

abstract class BaseLivewireDynamic extends BaseLivewire
{
    use FastInstantiation;

    public $parentId;
    public string $parentKey;
    public Collection $entity;
    public Collection $collection;
    public array $rules = [];
    public array $storedValues = [];

    public function mount()
    {
        $this->entity = collect([]);
        $this->generateRules('entity.');
        $this->collection = collect([]);
        $table = self::newClass($this->getTable(), []);
        $this->storedValues = $table->inputs;
        $this->filterBy[$this->parentKey] = $this->parentId;
    }


    private function generateRules($parent)
    {
        $new_rules = [];
        foreach ($this->getEntity()::getRules() as $key => $value) {
            $new_rules[$parent . $key] = $value;
        }
        $this->rules = array_merge($this->rules, $new_rules);
    }

    public function update($id)
    {
        $this->validateRules('collection.' . $id . ".");
        $object = $this->collection->pull($id);
        $entity = $this->getEntity()::find($id);
        $this->getService()->update($entity, $object);
        $this->dispatchBrowserEvent('show-inputs', ['id' => $id, 'show' => false]);
    }

    public function delete($id)
    {
        $entity = $this->getEntity()::find($id);
        $this->getService()->destroy($entity);
    }

    private function validateRules(string $rules)
    {
        $new_rules = [];
        foreach ($this->getEntity()::getRules() as $key => $value) {
            $new_rules[$rules . $key] =$value;
        }
        $this->validate($new_rules);
    }

    public function cancel($id)
    {

        $this->collection->pull($id);
        $this->dispatchBrowserEvent('show-inputs', ['id' => $id, 'show' => false]);
    }

    public function addToUpdate($id)
    {

        $entity = $this->getEntity()::find($id);
        $this->collection[$id] = $entity->attributesToArray();
        $this->generateRules("collection." . $id . ".");
        $this->dispatchBrowserEvent('show-inputs', ['id' => $id, 'show' => true]);
    }

    public function save()
    {
        $this->validateRules('entity.');
        $this->entity[$this->parentKey] = $this->parentId;
        $this->getService()->create($this->entity->toArray());
        $this->entity = collect([]);
    }


    public function getService(): BaseService
    {
        return self::newClass($this->getServiceClass());
    }

    abstract public function getServiceClass(): string;
}
