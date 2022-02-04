<?php

namespace App\Domain\Core\File\Models\Livewire;

use App\Domain\Core\File\Interfaces\LivewireCreatorDynamicInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Main\Services\BaseService;

class FileLivewireDynamic extends FileLivewireDynamicWithoutEntity
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

    public function generateAdditionalToHtml(): string
    {
        return sprintf("
        %s
                 parentKey='%s'
                :parentId='%s'",
            $this->firstParentGenerateAdditionalToHtml(),
            $this->parentKey,
            $this->getWithoutScopeAtrVariable($this->parentId));
    }

    protected function getPathFromClass(): string
    {
        return self::TEMPLATE_CLASS_PATH . self::CLASS_TEMPLATE_DYNAMIC;
    }

    protected function getPathFromBlade(): string
    {
        return self::TEMPLATE_BLADE_PATH . self::BLADE_TEMPLATE_DYNAMIC;
    }

    protected function generateAdditionalFormatClass(): array
    {
        return [
            $this->service
        ];
    }

}
