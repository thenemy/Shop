<?php


namespace App\Domain\Image\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Image\Entities\Image;

class ImageService extends BaseService
{

    public function getEntity()
    {
        return new Image();
    }
}
