<?php

namespace App\Domain\Common\Banners\Front\Main;

use App\Domain\Common\Banners\Entities\Banner;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

//*
// cannot change to dot because -> used in blade
//  take current value
//*//
class BannerEdit extends Banner implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::updateAttribute("link", 'text', __("Линк для банера")),
            InputFileTempAttribute::edit("image->ru", "Русский Баннер", "image_ru"),
            InputFileTempAttribute::edit("image->uz", "Узбекский Баннер", "image_uz"),
            InputFileTempAttribute::edit("image->en", "Английский Баннер", "image_en")
        ]);
    }
}
