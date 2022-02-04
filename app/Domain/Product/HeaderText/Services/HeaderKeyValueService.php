<?php

namespace App\Domain\Product\HeaderText\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\HeaderText\Entities\HeaderKeyValue;

class HeaderKeyValueService extends BaseService
{

    public function getEntity(): Entity
    {
        return HeaderKeyValue::new();
    }

    protected function createNew(array $object_data)
    {
        $object_data['key'] = $this->popCondition($object_data, "key", false, "-");
        $object_data['value'] = $this->popCondition($object_data, "value", false, "-");
        return parent::createNew($object_data);
    }

    public function update($object, array $object_data)
    {
        $object_data['key'] = $this->popCondition($object_data, "key", false, "-");
        $object_data['value'] = $this->popCondition($object_data, "value", false, "-");
        return parent::update($object, $object_data);
    }
}
