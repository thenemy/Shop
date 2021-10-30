<?php


namespace App\Domain\Product\Entities\Images\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\Images\Entities\CardImages;

class CardImageService extends BaseService
{

    public function getEntity()
    {
        return new CardImages();
    }
}
