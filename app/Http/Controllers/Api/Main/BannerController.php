<?php

namespace App\Http\Controllers\Api\Main;

use App\Domain\Common\Banners\Entities\BannerReadOnly;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        return response()->json([
            'result' => BannerReadOnly::all()
        ]);
    }
}
