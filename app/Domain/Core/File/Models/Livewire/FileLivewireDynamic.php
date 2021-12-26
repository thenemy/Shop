<?php

namespace App\Domain\Core\File\Models\Livewire;

use App\Domain\Core\File\Interfaces\LivewireCreatorDynamicInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Main\Services\BaseService;

class FileLivewireDynamic extends FileLivewireCreator implements LivewireCreatorDynamicInterface
{
    use AttributeGetVariable;

    public string $service;
    public string $parentKey;
    public string $parentId;

    public function __construct($className,
        $entity,
                                string $serviceClass,
                                string $parentKey,
                                string $parentId = "id"
    )
    {
        $this->parentKey = $parentKey;
        $this->service = $serviceClass;
        $this->parentId = $parentId;
        parent::__construct($className, $entity);
    }

    public function generateHtml(): string
    {
        return sprintf(
            "<livewire:admin.pages.%s.%s
                parentKey='%s'
                :parentId='%s'
            />",
            $this->classNameBlade,
            $this->getBladeName(),
            $this->parentKey,
            $this->getWithoutScopeAtrVariable($this->parentId)
        );
    }

    protected function getPathFromClass(): string
    {
        return self::TEMPLATE_CLASS_PATH . self::CLASS_TEMPLATE_DYNAMIC;
    }

    protected function getPathFromBlade(): string
    {
        return self::TEMPLATE_BLADE_PATH . self::BLADE_TEMPLATE_DYNAMIC;
    }

    protected function formatClass($file_from): string
    {
        return sprintf($file_from,
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getFunctions(),
            $this->getBladePath(),
            $this->initializeVariables(),
            $this->getOptionalDropItems(),
            $this->getTableClass(),
            $this->getEntityClass(),
            $this->service
        );
    }

    protected function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->entity->getTitle(),
//            $this->getFunctionComponents(),
            $this->getTableToBlade()
        );
    }
}
