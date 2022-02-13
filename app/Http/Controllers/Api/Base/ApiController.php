<?php

namespace App\Http\Controllers\Api\Base;

use App\Domain\Core\Main\Services\BaseService;
use App\Http\Controllers\Api\Interfaces\ApiControllerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class ApiController extends Controller implements ApiControllerInterface
{
    public function result($result, $status = 200)
    {
        return response()->json([
            self::PREFIX_RESULT => $result
        ], $status);
    }

    public function create(BaseService $service, array $data, $status = 200, $errorStatus = 400)
    {
        try {
            return $this->result($service->create($data), $status);
        } catch (\Exception $exception) {
            return $this->result([
                "errors" => $exception->getMessage()
            ], $errorStatus);
        }
    }

    public function createFast(BaseService $service, $status = 200, $errosStatus = 400)
    {
        return $this->create($service, Request::all(), $status, $errosStatus);
    }
}
