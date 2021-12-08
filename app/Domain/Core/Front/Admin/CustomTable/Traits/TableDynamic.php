<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGrayLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonRedLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\CreditProduct\Front\DynamicTable\CreditDynamicIndex;
use App\Domain\CreditProduct\Services\CreditService;

trait TableDynamic
{
    public $inputs = [];
    public $front_attribute = [];

    public function getInputs($name)
    {
        $real_attribute = explode('-', $name);
        if (empty($this->inputs)) {
            $this->inputs['id'] = TextAttribute::generation($this, 'id');
            $this->generateInput();
            $this->inputs['actions'] = AllActions::generation([
                ButtonGreenLivewire::new(__("Обновить"), "update('" . $this->id . "')"),
                ButtonGrayLivewire::new(__("Отменить"), "cancel('" . $this->id . "')")
            ]);
        }
        return $this->inputs[$real_attribute[0]];
    }

    public function getFrontAttributes($name)
    {
        $real_attribute = explode('-', $name);
        if (empty($this->front_attribute)) {
            $this->front_attribute['id'] = TextAttribute::generation($this, 'id');
            $this->generateAttributes();
            $this->front_attribute['actions'] = $this->getActionsAttribute();
        }
        return $this->front_attribute[$real_attribute[0]];
    }

    public function getInputsDecision($name, $decide)
    {
        if ($decide) {
            return $this->getInputs($name);
        } else {
            return $this->getFrontAttributes($name);
        }
    }

    private function generateInput()
    {
        foreach ($this->getRules() as $key => $value) {
            $is_number = false;
            foreach (explode("|", $value) as $item) {
                if ($item == "numeric") {
                    $is_number = true;
                    break;
                }
            }
            $this->inputs[$key] = InputTableAttribute::generate(
                $key,
                $is_number ? "number" : "text",
                "collection." . $this->id . '.' . $key);
        }
    }

    private function generateAttributes()
    {
        foreach ($this->getRules() as $key => $value) {
            $this->front_attribute[$key] = TextAttribute::generation(
                $this,
                $key
            );
        }
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([
            ...$this->getAddingCustom(),
            ButtonGreenLivewire::new(__("Изменить"), "addToUpdate('" . $this->id . "')"),
            ButtonRedLivewire::new(__("Удалить"), sprintf("delete('%s')", $this->id)),
        ]);
    }

    public function getAddingCustom(): array
    {
        return [];
    }

    /**
     * title for opening container
     **/
    abstract public function getTitle(): string;


    public static function getDynamic($className): FileLivewireDynamic
    {
        $class = get_called_class();
        return new FileLivewireDynamic(
            $className,
            new $class(),
            self::getBaseService(),
            self::getDynamicParentKey()
        );
    }

    abstract public static function getBaseService(): string;

    /**
     * for filtration and insertion
     */
    abstract public static function getDynamicParentKey(): string;
}
