<?php

namespace App\Domain\Installment\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\CreditProduct\Entity\Credit;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Interfaces\TakenCreditRelationInterface;
use App\Domain\Installment\Payable\TakenCreditPayable;
use App\Domain\Order\Interfaces\UserPurchaseRelation;
use App\Domain\Order\Services\UserPurchaseService;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\User;
use App\Domain\User\Services\SuretyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TakenCreditService extends BaseService implements TakenCreditRelationInterface
{
    use FileUploadService;

    private SuretyService $surety;
    private UserPurchaseService $purchaseService;

    public function __construct()
    {
        $this->surety = new SuretyService();
        $this->purchaseService = new UserPurchaseService();

        parent::__construct();
    }

    public function getEntity(): Entity
    {
        return new TakenCreditPayable();
    }


    private function setKeys(array &$object_data)
    {

    }

    // Do we need really surety to be created for this call
    // add check box for creattion surety
    // if it was checked create and throw error when needed
    // if it is not added so skipp serialization part
    // dispatch event
    // x-data show in alpine
    // a have container to put condition
    // visible widget
    public function create(array $object_data)
    {
        $this->serializeTempFile($object_data, isset($object_data['surety_is']));
        try {
            DB::beginTransaction();
            $user_data = User::findByPlastic($object_data['plastic_id'])
                ->selectUserData()->first();
            $object_data['user_credit_data_id'] = $user_data->id;
            $object_data['user_id'] = $user_data->user_id;
            $surety_data = $this->popCondition($object_data, self::SURETY_SERVICE);
            if (array_key_exists("check", $surety_data)) {
                $object_data['surety_id'] = $this->surety->create($surety_data)->id;
            }
            $purchases = $this->purchaseService->create($object_data);
            $object = parent::create(array_merge($object_data, [
                'purchase_id' => $purchases->id,
                'status' => true]));
            $object_data['taken_credit_id'] = $object->id;
            Log::debug("SUCCESS TAKEN_CREDIT", $object->toArray());
            $payService = new InstallmentPayService($object_data, $object);
            $payService->pay();
            DB::commit();
            return $object;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }
}
