<?php

namespace App\Domain\Shop\Api;

use App\Domain\Shop\Entities\Shop;

class ShopCard extends Shop
{
    private function takeImage($object, $skip)
    {
        return $object[$skip]->productImageHeader->image->fullPath();
    }

    public function toArray()
    {
        $object = $this->product()->take(5)->get();
        if ($object->count() == 5)
            return [
                "name" => $this->name,
                "slug" => $this->slug,
                "logo" => $this->logo->fullPath(),
                "image" => $this->image->fullPath(),
                "left_image" => $this->takeImage($object, 0),
                "right_image" => [
                    $this->takeImage($object, 1),
                    $this->takeImage($object, 2),
                    $this->takeImage($object, 3),
                    $this->takeImage($object, 4)
                ]
            ];
    }
}
