<?php

namespace App\Http\Controllers\Api\Base;

use App\Domain\Core\Main\Services\BaseService;
use App\Http\Controllers\Api\Interfaces\ApiControllerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

/**
 * @OA\Info(
 *    title="Your super  ApplicationAPI",
 *    version="1.0.0",
 * )
 */
abstract class ApiController extends Controller implements ApiControllerInterface
{
    protected function result($result, $status = 200)
    {
        return response()->json([
            self::PREFIX_RESULT => $result
        ], $status);
    }

    protected function errors($errors, $status = 400)
    {
        return response()->json([
            self::PREFIX_ERRORS => $errors,
        ], $status);
    }

    protected function saveResponse(\Closure $closure)
    {
        try {
            return $closure();
        } catch (\Exception $exception) {
            return $this->errors($exception->getMessage(), $exception->getCode() != 0 ? $exception->getCode() : $errorStatus);
        }
    }

    protected function create(BaseService $service, array $data, $status = 201, $errorStatus = 400)
    {
        try {
            return $this->result($service->create($data), $status);
        } catch (\Exception $exception) {
            return $this->errors($exception->getMessage(), $exception->getCode() != 0 ? $exception->getCode() : $errorStatus);
        }
    }

    protected function createFast(BaseService $service, $status = 201, $errosStatus = 400)
    {
        return $this->create($service, Request::all(), $status, $errosStatus);
    }

    /**
     * @param BaseService $service
     * @param \Closure $response_callback
     * @param array $data
     * @param int $errorStatus
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createCustom(BaseService $service, \Closure $response_callback, array $data = [], $errorStatus = 400): \Illuminate\Http\JsonResponse
    {
        try {
            return $response_callback($service->create(array_merge(Request::all(), $data)));
        } catch (\Exception $exception) {
            return $this->errors($exception->getMessage(), $exception->getCode() != 0 ? $exception->getCode() : $errorStatus);
        }
    }

    protected function update(BaseService $service, $object, array $data = [], $status = 201, $errorStatus = 400)
    {
        try {
            return $this->result($service->update($object, $data), $status);
        } catch (\Exception $exception) {
            return $this->errors($exception->getMessage(), $exception->getCode() != 0 ? $exception->getCode() : $errorStatus);

        }
    }

    protected function updateFast(BaseService $service, $object, $status = 201, $errosStatus = 400)
    {
        return $this->update($service, $object, Request::all(), $status, $errosStatus);
    }

    protected function updateCustom(BaseService $service, $object, \Closure $response, array $data = [], $errorStatus = 400)
    {
        try {
            return $response($service->update($object, array_merge(Request::all(), $data)));
        } catch (\Exception $exception) {
            return $this->errors($exception->getMessage(), $exception->getCode() != 0 ? $exception->getCode() : $errorStatus);

        }
    }
}
