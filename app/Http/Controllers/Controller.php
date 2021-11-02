<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $form;

    public function __construct()
    {

    }

    public function index()
    {
        return $this->create("saasfasfsaf");
    }

    public function update(Request $request)
    {
        return $this->update("adsdasdasdadasd", [$request->id, "params"=>$request->params]);
    }
}
