<?php

namespace App\Domain\Core\File\Interfaces;

interface LivewireCreatorInterface
{

    const BASE_CLASS = "App/Http/Livewire/Admin/";
    const BASE_BLADE = "resources/views/livewire/admin/";
    /**
     *  FROM_CLASS
     * @params first    --- namespace
     *         second   --- classname livewire
     *         third    --- path to blade
     *         fourth   --- class name of table
     *         fifth    --- class name of entity
     *         sixth    --- set of functions  (in front entity described)
     */
    const CLASS_TEMPLATE = "BaseLivewire.text";
    const FROM_CLASS = self::BASE_CLASS . "Templates/" . self::CLASS_TEMPLATE;

    const BLADE_TEMPLATE = "base-template.blade.php";
    /**
     * @params  first   --- set of functions
     */
    const FROM_BLADE = self::BASE_BLADE . "template/" . self::BLADE_TEMPLATE;

    const TO_CLASS = self::BASE_CLASS . "Pages/";
    const TO_BLADE = self::BASE_BLADE . "pages/";

    const INDEX = "Index";

    public function openIndex();
}
