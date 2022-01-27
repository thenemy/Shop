<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Tables;

use App\Domain\Category\Front\Dynamic\FiltrationKeyCategoryDynamicWithoutEntity;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractDynamicTable;

class FiltrationKeyCategoryTable extends AbstractDynamicTable
{

    public function getInputs(): array
    {
        return $this->generateNewInput(FiltrationKeyCategoryDynamicWithoutEntity::getCustomRules());
    }

    public function getColumns(): array
    {
        return [
            Column::new(__("Название RU"), "key_ru-index"),
            Column::new(__("Название UZ"), "key_uz-index"),
            Column::new(__("Название EN"), "key_en-index"),
        ];
    }
}
