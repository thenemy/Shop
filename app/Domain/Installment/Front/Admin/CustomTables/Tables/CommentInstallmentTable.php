<?php

namespace App\Domain\Installment\Front\Admin\CustomTables\Tables;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractDynamicTable;
use App\Domain\Installment\Entities\CommentInstallment;

class CommentInstallmentTable extends AbstractDynamicTable
{

    public function getInputs(): array
    {
        return $this->generateInput(CommentInstallment::getRules());
    }

    public function getColumns(): array
    {
        return [
            Column::new(__("Дата создания"), "created_at-index"),
            Column::new(__("Комментарий"), "comment-index")
        ];
    }
}
