<?php

namespace App\Http\Controllers\Api\Action;

use App\Domain\Order\Entities\Order;
use App\Domain\Order\Services\OrderService;
use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Base\ApiController;
use Illuminate\Http\Request;

class BasketController extends ApiController
{
    private OrderService $service;

    public function __construct()
    {
        $this->service = new OrderService();
    }

    /**
     *  Request may contain
     *  quantity
     *  order    -- json where might be about color
     *  for know just put everything in || description ||
     */
    public function basket(Request $request, Product $product)
    {
        return $this->saveResponse(function () use ($product, $request) {
            $object_data = [
                "product_id" => $product->id
            ];
            $this->service->createWith($object_data, $request->all());
            auth()->user()->basket()->attach($product);
        });
    }

    // for quantity
    public function updateOrder(Request $request, Order $order)
    {
        return $this->saveResponse(function () use ($request, $order) {
            $this->service->update($order, $request->all());
        });
    }


    public function destroyOrder(Order $order)
    {
        return $this->saveResponse(function () use ($order) {
            $this->service->destroy($order);
        });
    }

    public function massDestroyOrder(Request $request)
    {
        $request->validate([
            "ids" => "required|array",
        ]);
        $this->saveResponse(function () use ($request) {
            Order::whereIn("id", $request->ids)->delete();
        });
    }
}
