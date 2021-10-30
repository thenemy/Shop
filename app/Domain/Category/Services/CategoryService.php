<?php


namespace App\Domain\Category\Services;


use App\Domain\Category\Entities\Category;
use App\Domain\Core\Main\Services\BaseService;

class CategoryService extends BaseService
{

    public function getEntity(): Category
    {
        return new Category();
    }
}
