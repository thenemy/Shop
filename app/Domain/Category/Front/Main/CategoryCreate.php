<?php

namespace App\Domain\Category\Front\Main;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\IconCat;
use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class CategoryCreate extends Category implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::createAttribute("name", "text", "Введите  имя категории"),
            new InputFileTempAttribute(
                self::CATEGORY_ICON_DATA,
                "Загрузите иконку",
            ),
            ...$this->additionalGeneration()
        ]);
    }

    public function additionalGeneration():array
    {
        return [];
    }
}
