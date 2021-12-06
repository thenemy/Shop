<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;

use App\Domain\Category\Front\Admin\Path\CategoryRouteHandler;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\Attributes\Models\LivewireStatusColumn;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Traits\InputGenerator;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\CreditProduct\Entity\Credit;

/**
 * there is convention give attribute name like realname_tablename
 * so realname must be followed by hyphen
 */
abstract class AbstractDynamicTable extends BaseTable
{
    use InputGenerator;

    public array $inputs;
    public string $storedVariants;

    public function __construct($entities = [])
    {
        parent::__construct($entities);
        $this->columns = [
            Column::new(__("ID"), "id-index"),
            ...$this->getColumns(),
            Column::new(__("Действия"), "actions")
        ];
        $inputs = [
            'id' => TextAttribute::preGenerate($this, 'Новый', true),
            'actions' => ButtonGreenLivewire::generate("Добавить", "save")
        ];
        $this->inputs = array_merge($inputs, $this->getInputs());
    }

    public function generateHtml(): string
    {
        return '<x-helper.table.table_dynamic
                :collection="$collection"
                :table="$table"
                :storedValues="$storedValues"
                :optional="$optional"/>';
    }

    public function getInputsByKey($name): string
    {
        $real_attribute = explode('-', $name);
//        dd($this->inputs);
        return trim(preg_replace('/\s\s+/', ' ', $this->inputs[$real_attribute[0]]));
    }

    abstract public function getInputs();
}
