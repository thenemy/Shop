<?php

namespace App\Http\Controllers\Api\Main;

use App\Domain\Common\Banners\Entities\BannerReadOnly;
use App\Domain\Common\Banners\Services\BannerService;
use App\Http\Controllers\Api\Base\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class BannerController extends ApiController
{
    public function index()
    {
        return $this->result(BannerReadOnly::first());
    }


    public function createBanner()
    {
        return $this->createFast(BannerService::new());
    }

}
