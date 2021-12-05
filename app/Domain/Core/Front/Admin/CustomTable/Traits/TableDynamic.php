<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGrayLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\CreditProduct\Front\DynamicTable\CreditDynamicIndex;
use App\Domain\CreditProduct\Services\CreditService;

trait TableDynamic
{
    public $inputs = [];

    public function getInputs($name)
    {
        $real_attribute = explode('_', $name);
        if (empty($this->inputs)) {
            $this->inputs['id'] = TextAttribute::preGenerate($this, 'id');
            $this->generateInput();
            $this->inputs['actions'] = AllActions::new([
                ButtonGreenLivewire::generate(__("Обновить"), "update('" . $this->id . "')"),
                ButtonGrayLivewire::generate(__("Отменить"), "cancel('" . $this->id . "')")
            ]);
        }
        return $this->inputs[$real_attribute[0]];
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
                "collection." . $this->id . $key);
        }
    }

    public function getActionsAttribute(): string
    {
        return ButtonGreenLivewire::generate(__("Добавить"), "addToUpdate('" . $this->id . "')");
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
            CreditService::class,
            self::getDynamicParentKey());
    }

    abstract public static function getDynamicParentKey(): string;
}
