<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Category\Front\Admin\Path\CategoryOpenRouteHandler;
use App\Domain\Category\Front\Opened\CategoryOpen;
use App\Domain\Category\Services\CategoryService;
use App\Domain\Core\Front\Admin\Form\Abstracts\AbstractForm;
use App\Domain\Core\Front\Admin\Form\Models\FormForModel;
use App\Domain\Core\Main\Services\BaseService;
use App\Http\Controllers\Base\Abstracts\BaseOpenController;
use App\Http\Requests\Admin\ParamsRequest;

class CategoryChildController extends BaseOpenController
{
    public function getEntityClass(): string
    {
        return CategoryOpen::class;
    }

    public function getForm(): AbstractForm
    {
        return new FormForModel(CategoryOpenRouteHandler::new(), __("Под Категории"));
    }

    public function index(ParamsRequest $request)
    {
//        dd(\Request::query());
        return $this->getIndex($request);
    }

    public function edit(ParamsRequest $request, CategoryOpen $category_open)
    {
        return $this->getEdit(
            $request,
            $category_open,
        );
    }

    public function getService(): BaseService
    {
        return new CategoryService();
    }

}
