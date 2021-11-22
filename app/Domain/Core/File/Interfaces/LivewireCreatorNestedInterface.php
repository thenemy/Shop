<?php

namespace App\Domain\Core\File\Interfaces;

interface LivewireCreatorNestedInterface
{
    /**
     *  FROM_CLASS
     * @params first    --- namespace
     *         second   --- classname livewire
     *         third    --- set of functions and variables
     *         fourth   --- path to blade
     *         fifth    --- variable to blade
     *         sixth    --- optional dropdown items
     *         seventh  --- class name of table
     *         eighth   --- class name of entity
     *         ninth    --- class name of decline table
     */
    const CLASS_TEMPLATE_NESTED = "BaseLivewireNested.txt";
    const BLADE_TEMPLATE_NESTED  = "base-template-nested.blade.php";

    public function getTableDeclineClass(): string;
}
