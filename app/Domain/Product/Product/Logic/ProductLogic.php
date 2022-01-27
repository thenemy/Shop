<?php

namespace App\Domain\Product\Product\Logic;

use App\Domain\Currency\Traits\ConvertToSum;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Interfaces\ProductInterface;

class ProductLogic implements ProductInterface
{
    use ConvertToSum;

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getPrice()
    {
        $real_price = $this->product->price;
        $real_price = $this->considerCurrency($real_price);

        return $this->considerDiscounts($real_price);
    }

    private function considerCurrency($real_price)
    {
        if ($this->product->currency == self::CURRENCY_USD_DB)
            $real_price = $this->convertToSum($this->product->price);
        return $real_price;
    }

    private function considerDiscounts($real_price)
    {
        if ($this->product->discounts()->exists()) {
            $calculate_percent_price = ($this->product->percentage
                    + $this->product->discounts()->sum("percent")) / 100 * $real_price;
            return $real_price - $calculate_percent_price;
        }
        if ($this->product->percentage) {
            return $real_price - $this->product->percentage / 100 * $real_price;
        }
        return $real_price;
    }
}