<?php

namespace App\Domain\Product\Api;

use App\Domain\CreditProduct\Entity\Credit;
use App\Domain\Product\Product\Builders\ProductBuilder;
use App\Domain\Product\Product\Builders\ProductCardBuilder;
use App\Domain\Product\Product\Entities\Product;
use Illuminate\Support\Facades\DB;

class ProductCard extends Product
{
    public function newEloquentBuilder($query)
    {
        return ProductCardBuilder::new($query);
    }

    private function calculateForCreditPrice(Credit $credit, $price)
    {
        $percent_price = $credit->percent * $price / 100;
        $real_price = $percent_price + $price;
        return $real_price / $credit->month;
    }

    private function credit()
    {
        if ($this->mainCredit()->exists()) {
            $main = $this->mainCredit()->first();
            $credit = $main->lastCredit();
            return [
                "month" => $credit->month,
                "price" => $this->calculateForCreditPrice($credit, $this->real_price),
                "name" => $this->mainCredit()->first()->name_current
            ];
        }
        return [];
    }

    public function toArray()
    {
        $response = [
            "image" => $this->productImageHeader->image->fullPath(),
            "title" => $this->title_current,
            "price" => $this->productLogic->getPriceCurrency(),
            "discount" => $this->productLogic->discountPercent(),
            "real_price" => $this->real_price,
            "mark" => $this->mark()->avg("mark") ?? 0,
            "num_comment" => $this->comment()->count(),
        ];
        $response['credit'] = $this->credit();
        return $response;
    }
}
