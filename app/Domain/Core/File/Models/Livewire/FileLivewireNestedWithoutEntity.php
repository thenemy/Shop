<?php

namespace App\Domain\Core\File\Models\Livewire;

class FileLivewireNestedWithoutEntity extends FileLivewireNested
{
    public function generateHtml(): string
    {

        return sprintf("<livewire:admin.pages.%s.%s
                keyToAttach='%s'
                />",
            $this->classNameBlade,
            $this->getBladeName(),
            $this->entity->key_to_attach,
        );
    }

    protected function getPathFromClass(): string
    {
        return self::TEMPLATE_CLASS_PATH . self::CLASS_TEMPLATE_NESTED_WITHOUT;
    }

    protected function getPathFromBlade(): string
    {
        return self::TEMPLATE_BLADE_PATH . self::BLADE_TEMPLATE_NESTED_WITHOUT;
    }
}
