<?php


namespace App\Domain\Product\Entities\HeaderComponent\TextComponent\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\HeaderComponent\TextComponent\Entities\ImageText;

class ImageTextService extends BaseService
{

    public function getEntity()
    {
        return new ImageText();
    }
}
