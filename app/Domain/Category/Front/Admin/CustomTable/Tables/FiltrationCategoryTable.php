<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Tables;

use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractDynamicTable;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;

class FiltrationCategoryTable extends AbstractDynamicTable
{

    public function getInputs(): array
    {
        return [
            'key' => InputTableAttribute::generate('Название', 'text', 'entity.key'),
            'attribute' => FiltrationCategoryDropDown::generate('entity.')
        ];
    }

    public function getColumns(): array
    {
        return [
            new Column(__("Название"), "key-index"),
            new Column(__("Компонент"), "attribute-index")
        ];
    }
}
