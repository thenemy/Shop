<?php

namespace App\Http\Controllers\Api\Base;

use App\Http\Controllers\Api\Interfaces\ApiControllerInterface;
use App\Http\Controllers\Controller;

class ApiController extends Controller implements ApiControllerInterface
{
    public function result($result, $status = 200)
    {
        return response()->json([
            self::PREFIX_RESULT => $result
        ], $status);
    }
}
