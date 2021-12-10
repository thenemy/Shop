<?php

namespace App\Http\Controllers\Base\Abstracts;

use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Http\Requests\Admin\ParamsRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

abstract class BaseOpenController extends BaseController
{
    public function getIndex($request, $variables = [])
    {
        return parent::getIndex($request, [
            'params' => $request->params
        ]);
    }

    public function getEdit(Request $formRequest, $entity, $params = [], $variables = [])
    {
        $params = array_merge($params, [
            'params' => $formRequest->params
        ]);
        return parent::getEdit($formRequest, $entity, $params, $variables);
    }

    public function getCreate($request, $params = [], $variables = [])
    {
        return parent::getCreate($request, [
            'params' => $request->params
        ], $variables);
    }
}