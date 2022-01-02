<?php

namespace App\Domain\Core\File\Interfaces;

interface LivewireCreatorDynamicInterface
{
    const CLASS_TEMPLATE_DYNAMIC = "BaseLivewireDynamic.txt";
    const BLADE_TEMPLATE_DYNAMIC = "base-template-dynamic.blade.php";

    const CLASS_TEMPLATE_DYNAMIC_WITHOUT_ENTITY = "BaseLivewireDynamicWithoutEntity.txt";
    const BLADE_TEMPLATE_DYNAMIC_WITHOUT_ENTITY = "base-template-dynamic-without-entity.blade.php";
}
