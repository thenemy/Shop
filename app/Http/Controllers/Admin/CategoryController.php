<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Category\Front\Models\ParentCategory;
use App\Domain\Category\Services\CategoryService;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Main\Services\BaseService;
use App\Http\Controllers\Base\Abstracts\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function getService(): BaseService
    {
        return new CategoryService();
    }

    public function getEntityClass(): string
    {
        return ParentCategory::class;
    }
}
