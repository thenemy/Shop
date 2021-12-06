<?php

namespace App\Domain\CreditProduct\Front\Main;

use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\TextAreaAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Entity\MainCredit;

class MainCreditCreate extends MainCredit implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::createAttribute("name", "text",
                __("Введите название")),
            new TextAreaAttribute('helper_text',  __("Введите условия"),
               ),
            InputAttribute::createAttribute('initial_percent', "number",
                __("Введите первоначальный процент оплаты"))
        ]);
    }
}
