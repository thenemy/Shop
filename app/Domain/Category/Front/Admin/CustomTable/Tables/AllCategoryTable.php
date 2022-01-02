<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Tables;

use App\Domain\Category\Front\Admin\CustomTable\Traits\CommonCategoryTable;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\BaseTable;

class AllCategoryTable extends AbstractTable
{
    use CommonCategoryTable;

    public function getColumns(): array
    {
        return [
            ...$this->getCommonColumns()
        ];
    }

}
