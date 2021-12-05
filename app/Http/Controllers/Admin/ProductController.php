<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Core\Front\Admin\Form\Abstracts\AbstractForm;
use App\Domain\Core\Front\Admin\Form\Models\FormForModel;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\Path\ProductRouteHandler;
use App\Domain\Product\Product\Services\ProductService;
use App\Http\Controllers\Base\Abstracts\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductEditRequest;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    public function getEntityClass(): string
    {
        return Product::class;
    }

    public function getService(): BaseService
    {
        return ProductService::new();
    }

    public function getForm(): AbstractForm
    {
        return FormForModel::new(ProductRouteHandler::new(), __("Товар"));
    }


    public function index(Request $request)
    {
        return $this->getIndex($request);
    }

    public function create(Request $request)
    {
        return $this->getCreate($request);
    }

    public function store(ProductCreateRequest $request)
    {
        return $this->getStore($request->validated());
    }

    public function edit(Request $request, Product $product)
    {
        return $this->getEdit($request, $product, [$product]);
    }

    public function update(ProductEditRequest $request, Product $product)
    {
        return $this->getUpdate($request->validated(), $product);
    }
}
