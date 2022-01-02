<?php

namespace App\Domain\CreditProduct\Services;

use App\Domain\Category\Services\CategoryService;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\CreditProduct\Entity\MainCredit;
use Illuminate\Support\Facades\DB;

class MainCreditService extends BaseService
{
    private CreditService $creditService;

    public function __construct()
    {
        parent::__construct();
        $this->creditService = new CreditService();
    }

    public function getEntity(): Entity
    {
        return new MainCredit();
    }

    public function create(array $object_data)
    {
        try {
            DB::beginTransaction();
            $credits = $this->popCondition($object_data, "credits");
            $object = parent::create($object_data);
            $this->creditService->createMany($credits, ['main_credit_id' => $object->id]);
            DB::commit();
            return $object;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }
}
