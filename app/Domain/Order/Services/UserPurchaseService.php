<?php

namespace App\Domain\Order\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Delivery\Services\DeliverySendService;
use App\Domain\Order\Entities\Purchase;
use App\Domain\Order\Entities\UserPurchase;
use App\Domain\Order\Interfaces\UserOrderInterface;
use App\Domain\Order\Interfaces\UserPurchaseRelation;
use App\Domain\Product\Product\Entities\Product;
use Illuminate\Support\Facades\DB;

class UserPurchaseService extends BaseService implements UserPurchaseRelation
{
    private PurchaseService $purchaseService;
    private DeliverySendService $deliverySendService;

    public function __construct()
    {
        $this->purchaseService = new PurchaseService();
        $this->deliverySendService = new DeliverySendService();
        parent::__construct();
    }

    private function toPurchases(array &$object_data)
    {
        if (isset($object_data[self::PURCHASE_SERVICE])) {
            return $object_data[self::PURCHASE_SERVICE];
        }
        if (isset($object_data[self::PRODUCTS_ENCODE])) {
            $product = json_decode($object_data[self::PRODUCTS_ENCODE], true);
            unset($object_data[self::PRODUCTS_ENCODE]);
            $purchases = [];
            foreach ($product as $id => $number) {
                $uzs_price = Product::find($id)->real_price;
                array_push($purchases, [
                    'quantity' => $number,
                    'price' => $uzs_price * $number,
                    'product_id' => $id,
                    "order" => json_encode("", JSON_UNESCAPED_UNICODE)
                ]);
            }
            return $purchases;
        }
    }

    private function getStatus(array &$object_data): int
    {
        $status = UserOrderInterface::INSTALMENT;
        if (isset($object_data['delivery'])) {
            $status += UserOrderInterface::DELIVERY;
            throw new \Exception("Delivery method is not implemented now");
        } else {
            $status += UserOrderInterface::SELF_DELIVERY;
        }
        unset($object_data['delivery']);

        return $status;
    }

    public function getEntity(): Entity
    {
        return new UserPurchase();
    }

    public function create(array $object_data): UserPurchase
    {
        try {
            DB::beginTransaction();
            $object_data['status'] = $this->getStatus($object_data);
            $object = parent::create($object_data);
            $purchases = $this->toPurchases($object_data);
            $object->purchases()->createMany($purchases);
            DB::commit();
            return $object;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }

    }

    public function update($object, array $object_data)
    {
        return parent::update($object, $object_data); // TODO: Change the autogenerated stub
    }
}
