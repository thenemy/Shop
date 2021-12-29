<?php

namespace App\Domain\Common\Brands\Front\Main;

use App\Domain\Common\Brands\Entities\Brand;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class BrandEdit extends Brand implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::updateAttribute("brand", "text", __("Название брэнда")),
            InputFileTempAttribute::edit("image", __("Лого"))
        ]);
    }
}
