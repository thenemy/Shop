<?php

namespace App\Domain\Order\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\Core\Main\Traits\FilterArray;

class PurchaseBuilder extends BuilderEntity
{

    protected function getSearch(): string
    {
        return "id";
    }
    public function filterBy($filter)
    {
         parent::filterBy($filter);
        if(isset($filter['user_purchase_id'])){
            $this->where('user_purchase_id', $filter['user_purchase_id']);
        }
        return $this;
    }
}
