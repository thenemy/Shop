<?php

namespace App\Domain\Core\File\Models\Livewire;

use App\Domain\Core\File\Interfaces\LivewireCreatorDynamicInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;

class FileLivewireDynamicWithoutEntity extends FileLivewireCreator implements LivewireCreatorDynamicInterface
{
    use AttributeGetVariable;

    private string $initial;

    public function __construct(
        $className,
        $entity,
        string $initial = ""
    )
    {
        $this->initial = $initial;
        parent::__construct($className, $entity);
    }

    public function generateAdditionalToHtml(): string
    {
        if ($this->initial)
            return sprintf(":initial='%s'", $this->getWithoutScopeAtrVariable($this->initial));
        return "";
    }


    protected function getPathFromClass(): string
    {
        return self::TEMPLATE_CLASS_PATH . self::CLASS_TEMPLATE_DYNAMIC_WITHOUT_ENTITY;
    }

    protected function getPathFromBlade(): string
    {
        return self::TEMPLATE_BLADE_PATH . self::BLADE_TEMPLATE_DYNAMIC_WITHOUT_ENTITY;
    }

    protected function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->entity->getTitle(),
            $this->getTableToBlade()
        );
    }
}
