<?php

namespace App\Domain\Category\Front\Main;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\IconCat;
use App\Domain\Category\Front\Dynamic\FiltrationCategoryDynamicWithoutEntity;
use App\Domain\Category\Front\Dynamic\FiltrationKeyCategoryDynamicWithoutEntity;
use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use Symfony\Component\Console\Input\Input;

class CategoryCreate extends Category implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputLangAttribute("name", __("Введите  имя категории")),
            new InputFileTempAttribute(
                self::CATEGORY_ICON_DATA,
                "Загрузите иконку",
            ),
            FiltrationKeyCategoryDynamicWithoutEntity::getDynamic("CategoryCreate"),
            ...$this->additionalGeneration()
        ]);
    }

    public function additionalGeneration(): array
    {
        return [
            InputAttribute::createAttribute(self::DELIVERY_IMPORTANT_TO, "checkbox", "Ценный груз")
        ];
    }
}
