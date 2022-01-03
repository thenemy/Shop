<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use Livewire\Component;

abstract class BaseLivewireFactoring extends Component
{
    public $counter = 0;
    public $entityId;
    public $className;
    public string $prefix = '';

    /**
     * @param null $entity
     * @param string $key -- used for initial counter and for prefixing
     */
    public function mount($entity = null)
    {
        if ($this->prefix && $entity) {
            $key = $this->prefix;
            $this->entityId = $entity->id;
            $this->className = get_class($entity);
            $this->counter = $entity->$key;
        }
    }

    public function addCounter()
    {
        $this->counter++;
    }

    public function render()
    {
        return view($this->getPath(), [
            'entity' => $this->className::find($this->entityId)
        ]);
    }

    abstract function getPath();
}
