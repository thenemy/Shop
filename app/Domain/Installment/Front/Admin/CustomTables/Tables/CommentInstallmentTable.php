<?php

namespace App\Domain\Installment\Front\Admin\CustomTables\Tables;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractDynamicTable;
use App\Domain\Installment\Entities\CommentInstallment;
use App\Domain\Installment\Front\Dynamic\CommentInstallmentDynamic;

class CommentInstallmentTable extends AbstractDynamicTable
{

    public function getInputs(): array
    {
        return $this->generateNewInput(CommentInstallmentDynamic::getCustomRules());
    }

    public static function setInputAttr($key, $type)
    {
        if ($type == self::defer()) {
            return true;
        }

    }

    public function getColumns(): array
    {
        return [
            Column::new(__("Дата создания"), "created_at-index"),
            Column::new(__("Комментарий"), "comment-index")
        ];
    }
}
