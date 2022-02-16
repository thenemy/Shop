<?php

namespace App\Domain\Common\Discounts\Entities;

class DiscountReadOnly extends Discount
{
    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "mob_image" => $this->getMobImageCurrentAttribute()->fullPath(),
            "des_image" => $this->getDesImageCurrentAttribute()->fullPath(),
        ];
    }
}
