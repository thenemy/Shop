<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\User;

class UserCreate extends User implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        // TODO: Implement generateAttributes() method.
    }
}
