<?php

namespace App\Domain\CreditProduct\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Main\Traits\FastInstantiation;
use App\Domain\CreditProduct\Entity\MainCredit;
use App\Domain\CreditProduct\Front\DynamicTable\CreditDynamicIndex;
use App\Domain\CreditProduct\Services\CreditService;

class MainCreditEdit extends MainCredit implements CreateAttributesInterface
{
    use FastInstantiation;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::updateAttribute("name", "text",
                __("Введите название")),
            InputAttribute::updateAttribute('helper_text', 'text',
                __("Введите условия")),
            InputAttribute::updateAttribute('initial_percent', "number",
                __("Введите первоначальный процент оплаты")),
            CreditDynamicIndex::getDynamic("MainCredit")
        ]);
    }
}
