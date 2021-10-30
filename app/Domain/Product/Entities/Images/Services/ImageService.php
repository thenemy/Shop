<?php


namespace App\Domain\Product\Entities\Images\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\Image;

class ImageService extends BaseService
{

    public function getEntity()
    {
        return new Image();
    }
}
