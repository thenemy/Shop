<?php

namespace App\Http\Livewire\Admin\Base\Abstracts;

use App\Domain\Core\Main\Entities\Entity;
use App\Http\Livewire\Admin\Base\Rules\GenerateRules;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

// when object is deleted
// delete counter increased
// so, we do not need to remap other objects
abstract class BaseLivewireFactoring extends Component
{
    use GenerateRules;

    public $counter = 0;
    public $entityId;
    public $className;
    public string $prefix = '';
    public Collection $objects;
    public string $prefixKey;
    public string $initialSettingClass;
    public Collection $entities;
    public   $entity;

    /**
     * @param null $entity
     * @param string $key -- used for initial counter and for prefixing
     */
    public function mount($rules = [])
    {
        $this->entities = collect([]);
        $this->objects = collect([]);
        if ($this->initialSettingClass) {
            $this->initialSettingClass::initialize($this);
        }
        if (old($this->prefixKey)) {
            foreach (old($this->prefixKey) as $value) {
                $this->objects[$value] = [];
            }
        }
        $this->baseGenerateRules("objects.", $rules);
    }

    public function addCounter()
    {
        $this->counter++;
        $this->objects->push([$this->counter => []]);
    }

    public function remove($id)
    {
        $this->objects->pull($id);

    }

    public function removeEntity($id)
    {
        $this->initialSettingClass::delete($this, $id);
    }

    public function render()
    {
        return view($this->getPath());
    }

    abstract function getPath();
}
