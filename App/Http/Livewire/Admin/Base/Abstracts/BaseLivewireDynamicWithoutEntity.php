<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\EmptyService;
use App\Domain\User\Entities\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class BaseLivewireDynamicWithoutEntity extends BaseLivewireDynamic
{
    const PRIMARY_KEY = 'id';
    public int $counter = 0;
    public Collection $saved;
    public string $className;

    public function mount()
    {
        parent::mount();
        $this->className = $this->getEntity();
        $this->saved = collect([]);
    }

    public function update($id)
    {
        $this->validateRules('collection.' . $id . ".");
        $this->saved[$id] = $this->collection->pull($id);
        $this->dispatchBrowserEvent('show-inputs', ['id' => $id, 'show' => false]);
    }

    public function delete($id)
    {
        $this->saved->pull($id);
    }

    protected function getLists()
    {
        return new LengthAwarePaginator($this->saved->map(function ($item) {
            return self::newClass($this->getEntity(), $item);
        }), $this->saved->count(), $this->paginate, $this->page);
    }

    protected function findEntity($id)
    {
        return $this->saved[$id];
    }

    protected function setCollection($entity, $id)
    {
        $this->collection[$id] = $entity;
    }

    public function save()
    {
        $this->validateRules('entity.');
        $this->entity[self::PRIMARY_KEY] = ++$this->counter;
        $this->saved[$this->counter] = $this->entity->toArray();
        $this->entity = collect([]);
    }

    public function getServiceClass(): string
    {
        return EmptyService::class;
    }
}
