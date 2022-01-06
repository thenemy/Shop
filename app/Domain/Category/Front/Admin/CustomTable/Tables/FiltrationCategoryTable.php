<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Tables;

use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Category\Front\Dynamic\FiltrationCategoryDynamic;
use App\Domain\Category\Front\Dynamic\FiltrationCategoryDynamicWithoutEntity;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractDynamicTable;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use function Symfony\Component\Translation\t;

class FiltrationCategoryTable extends AbstractDynamicTable
{

    public function getInputs(): array
    {
        return $this->generateNewInput(FiltrationCategoryDynamicWithoutEntity::getCustomRules());
    }

    public function getColumns(): array
    {
        return [
            new Column(__("Название"), "key-index"),
            new Column(__("Компонент"), "attribute-index")
        ];
    }
}
