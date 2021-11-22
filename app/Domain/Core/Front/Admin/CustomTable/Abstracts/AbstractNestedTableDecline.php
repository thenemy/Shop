<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableNested;

abstract class AbstractNestedTableDecline extends AbstractTable implements TableNested
{
    public function getColumns(): array
    {
        return [
            new Column(__("Действия"), "decline_button")
        ];
    }
}
