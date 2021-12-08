<?php

namespace App\Domain\Category\Front\All;

use App\Domain\Category\Entities\Category;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class AllCategoryCreate extends Category implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([

        ]);
    }
}
