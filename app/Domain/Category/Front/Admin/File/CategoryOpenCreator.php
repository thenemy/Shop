<?php

namespace App\Domain\Category\Front\Admin\File;

use App\Domain\Category\Front\Opened\CategoryOpen;
use App\Domain\Category\Front\Opened\CategoryOpenEdit;
use App\Domain\Core\File\Factory\MainOpenFactoryCreator;

class CategoryOpenCreator extends MainOpenFactoryCreator
{

    public function getEntityClass(): string
    {
        return CategoryOpen::class;
    }

    public function getIndexEntity(): string
    {
        return CategoryOpen::class;
    }

    public function getCreateEntity(): string
    {
        return "";
    }

    public function getEditEntity(): string
    {
        return CategoryOpenEdit::class;
    }
}
