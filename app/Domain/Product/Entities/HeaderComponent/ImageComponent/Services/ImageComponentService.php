<?php


namespace App\Domain\Product\Entities\HeaderComponent\ImageComponent\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\HeaderComponent\Header\Entities\ImageComponent;

class ImageComponentService extends BaseService
{

    public function getEntity()
    {
       return new ImageComponent();
    }
}
