<?php

namespace App\Domain\Core\File\Models;

use App\Domain\Core\File\Interfaces\LivewireCreatorNestedInterface;

class FileLivewireNested extends FileLivewireCreator implements LivewireCreatorNestedInterface
{
    public function generateHtml(): string
    {

        return sprintf("<livewire:admin.pages.%s.%s
                :attachEntityId='%s'
                :attachEntity='get_class(%s)'
                keyToFilter='%s'
                :filterBy='[\"%s\" => \"%s\"]'
                />",
            $this->classNameBlade,
            $this->getBladeName(),
            "$" . "entity->id",
            "$" . "entity",
            $this->entity->key_to_attach,
            $this->entity->key_to_filter,
            "$" . "entity->id",
        );
    }

    protected function getPathFromClass(): string
    {
        return self::TEMPLATE_CLASS_PATH . self::CLASS_TEMPLATE_NESTED;
    }

    protected function getPathFromBlade(): string
    {
        return self::TEMPLATE_BLADE_PATH . self::BLADE_TEMPLATE_NESTED;
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
            $this->getOptionalDropItemsDecline(),
            $this->getTableClass(),
            $this->getEntityClass(),
            $this->getTableDeclineClass(),
        );
    }

    protected function getOptionalDropItemsDecline(): string
    {
        return $this->entity->liviwireOptionalDropDownDecline()->generateDropItems();
    }

    protected function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->entity->title_for_table,
            $this->getFunctionComponents()
        );
    }

    public function getTableDeclineClass(): string
    {
        return $this->entity->tableDeclineClass();
    }
}
