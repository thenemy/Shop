<?php

namespace App\Domain\Common\Banners\Services;

use App\Domain\Common\Banners\Entities\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;

class BannerService extends BaseService
{
    use FileUploadService;

    public function getEntity(): Entity
    {
        return new Banner();
    }

    public function create(array $object_data)
    {
        $this->serializeTempFile($object_data);
        $object_data['image'] = $this->popCondition($object_data, "image");
        return parent::create($object_data);
    }

    public function update($object, array $object_data)
    {
        $this->serializeTempFile($object_data);
        $object_data['image'] = $this->popCondition($object_data, 'image');
        return parent::update($object, $object_data);
    }
}
