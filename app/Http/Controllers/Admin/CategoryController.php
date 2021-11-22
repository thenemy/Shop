<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable;
use App\Domain\Category\Front\Admin\File\CategoryCreator;
use App\Domain\Category\Front\Models\CategoryCreate;
use App\Domain\Category\Front\Models\CategoryEdit;
use App\Domain\Category\Front\Models\CategoryIndex;
use App\Domain\Category\Services\CategoryService;
use App\Domain\Core\File\Interfaces\LivewireCreatorInterface;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\Form\Abstracts\AbstractForm;

use App\Domain\Core\Front\Admin\Form\Models\FormForModel;
use App\Domain\Core\Front\Admin\Routes\Models\CategoryRouteHandler;
use App\Domain\Core\Main\Services\BaseService;
use App\Http\Controllers\Base\Abstracts\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function getEntityClass(): string
    {
        return Category::class;
    }

    public function getTableClass(): string
    {
        return CategoryTable::class;
    }

    public function getIndexEntity(): string
    {
        return CategoryIndex::class;
    }

    public function getCreateEntity(): string
    {
        return CategoryCreate::class;
    }

    public function getEditEntity(): string
    {
        return CategoryEdit::class;
    }

    public function getForm(): AbstractForm
    {
        return new FormForModel(new CategoryRouteHandler(), __("Категории"));
    }

    public function getService(): BaseService
    {
        return new CategoryService();
    }

    public function index(Request $request)
    {
        return $this->getIndex($request);
    }

    public function createFiles()
    {
//        CategoryCreator::createFiles();
    }
}
