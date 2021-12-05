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
    public $entity;
    public Collection $collection;
    protected $rules = [];

    public function mount()
    {
        $this->entity = self::newClass($this->getEntity());
        $this->generateRules('entity.');
        $this->collection = collect([]);
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
        $object = $this->collection->pull($id);
        $entity = self::newClass($this->getEntity(), $object);
        $this->getService()->update($entity, $object);
    }

    public function cancel($id)
    {
        $this->collection->pull($id);
    }

    public function addToUpdate($id)
    {
        $entity = $this->getEntity()::find($id);
        $this->collection[$id] = $entity->attributesToArray();
        $this->generateRules("collection." . $id . ".");
    }

    public function save()
    {
        $new_entity = $this->entity->attributesToArray();
        $relation = [
            $this->parentKey => $this->parentId
        ];
        $this->getService()->create(array_merge($new_entity, $relation));
    }

    public function getService(): BaseService
    {
        return self::newClass($this->getServiceClass());
    }

    abstract public function getServiceClass(): string;
}
