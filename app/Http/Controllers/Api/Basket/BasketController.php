<?php

namespace App\Http\Controllers\Api\Basket;

use App\Http\Controllers\Api\Base\ApiController;

// write this down
class BasketController extends ApiController
{
    public function view()
    {
        $response = collect([]);
        $orders = auth()->user()->basket;
        foreach ($orders as $order) {
            $shop = $order->pull("shop"); // get shop of the order and pull from the order
            $key_specific = -1; // init variable
            // iterate over the result array to find whether it already contains that shop
            foreach ($response as $key => $value) {
                if ($value['shop']['slug'] == $shop['slug']) {
                    $key_specific = $key; // if it contains store the index
                    break;
                }
            }
            // if index was found ,add additional orders to that shop
            if ($key_specific != -1) {
                $previous = $response[$key_specific]['orders'] ?? [];
                $response[$key_specific]['orders'] = array_merge($previous, $order);
            } else { // initialize the new shop if the index was not found
                $response->push([
                    "shop" => $shop,
                    "orders" => $order
                ]);
            }
        }
        return $this->result($response->toArray());
    }
}
