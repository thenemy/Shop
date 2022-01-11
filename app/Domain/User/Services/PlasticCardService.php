<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Api\CardService\BindCard\Model\BindCardService;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\PlasticCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PlasticCardService extends BaseService
{
    public function getEntity(): Entity
    {
        return new PlasticCard();
    }

    protected function attach($object, $object_data)
    {
        $object->user()->attach($object_data['user_id']);
    }

    public function create(array $object_data)
    {
        try {
            DB::beginTransaction();
            if (!isset($object_data['plastic_data'])) {
                $service = new BindCardService();
                $this->validate($object_data, [
                    'transaction_id' => "required",
                    'code' => "required"
                ]);
                $result = $service->apply($object_data["transaction_id"], $object_data['code']);
            } else {
                $result = $object_data['plastic_data'];
                unset($object_data['plastic_data']);
            }
            $object_data = array_merge($object_data, $result['data']);
            $object = parent::create($object_data);
            $this->attach($object, $object_data);
            DB::commit();
            return $object;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw ValidationException::withMessages([
                "message" => $exception->getMessage()
            ]);
        }
//        return parent::create($object_data); // TODO: Change the autogenerated stub
    }
}
