<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonRedLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Errors\DynamicTableException;

trait FrontDynamicGeneration
{
    public array $front_attribute = [];

    public function getCustomFrontRules(): array
    {
        return [];
    }

    /**
     * to show already created entites
     */
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

    /***
     * get button actions for Actions column
     */
    public function getActionsAttribute(): string
    {
        return AllActions::generation([
            ...$this->getAddingCustomActions(),
            ButtonGreenLivewire::new(__("Изменить"), "addToUpdate('" . $this->id . "')"),
            ButtonRedLivewire::new(__("Удалить"), sprintf("delete('%s')", $this->id)),
        ]);
    }


    protected function generateAttributes()
    {
        $front = [];
        try {
            $front = $this->generateAttributesFromCustomRules($this->getCustomFrontRules());
        } catch (\Exception $exception) {
            $front = $this->generateAttributesFromRules($this->getRules());
        }
        $this->front_attribute = array_merge($this->front_attribute, $front);
    }

    protected function generateAttributesFromCustomRules(array $rules): array
    {
        if (empty($rules)) {
            throw  new DynamicTableException("Custom Rules are not exists");
        }
        $input = [];
        foreach ($rules as $key => $value) {
            if (!$value)
                $input[$key] = TextAttribute::generation(
                    $this,
                    $key
                );
            else
                $input[$key] = TextAttribute::generation(
                    $this,
                    $value($this->$key),
                    true
                );
        }
        return $input;
    }

    protected function generateAttributesFromRules($rules): array
    {
        $input = [];
        foreach ($rules as $key => $value) {
            $input[$key] = TextAttribute::generation(
                $this,
                $key
            );
        }
        return $input;
    }
}
