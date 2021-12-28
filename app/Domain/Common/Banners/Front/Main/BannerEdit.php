<?php

namespace App\Domain\Common\Banners\Front\Main;

use App\Domain\Common\Banners\Entities\Banner;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

//*
//  take current value
//*//
class BannerEdit extends Banner implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            InputAttribute::updateAttribute("link", 'text', __("Линк для банера")),
            new InputFileTempAttribute("image->ru", "Русский Баннер"),
            new InputFileTempAttribute("image->uz", "Узбекский Баннер"),
            new InputFileTempAttribute("image->en", "Английский Баннер")
        ]);
    }
}
