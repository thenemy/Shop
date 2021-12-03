<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\File\Attributes\FilesAttributes;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Product\Images\Entities\Image;
use App\Domain\Product\Product\Entities\Product;

class ProductEdit extends Product implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputFileAttribute(
                "image_product",
                "Картинки для товара",
                self::class,
                true)
        ]);
    }

    public function getImageCategoryAttribute(): FilesAttributes
    {
        return new FilesAttributes($this, "images",
            "product_1",
            Image::class,
            "image",
            "product_id");
    }


}
