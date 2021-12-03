<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDownSearch;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\BaseDropDown;
use App\Domain\Core\Front\Admin\DropDown\Items\DropItem;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class BaseDropDownSearchAttribute extends AbstractDropDownSearch implements HtmlInterface
{
    use AttributeGetVariable;

    protected string $searchLabel;
    protected string $searchByKey;
    protected bool $create;
    protected array $filterBy;

    public static function new(string $searchByKey,
                               string $searchLabel,
                               bool   $create = true,
                               array  $filterBy = [])
    {
        $self = get_called_class();
        $class = new $self([]);
        $class->searchByKey = $searchByKey;
        $class->searchLabel = $searchLabel;
        $class->create = $create;
        $class->filterBy = $filterBy;
        return $class;
    }

    public function generateHtml(): string
    {
        $dropDownClass = get_called_class();
        return sprintf(
            "<livewire:components.drop-down.drop-down-search
            searchByKey='%s'
            dropDownClass='%s'
            %s
            searchLabel='%s'
             />",
            $this->searchByKey,
            $dropDownClass,
            !$this->create ? ":initial=\"" . $this->getWithoutScopeAtrVariable($this->key) . "\"" : '',
            $this->searchLabel
        );
    }

    /**
     * attribute -- what will be displayed to user
     * key --- is what will be assigned to entity
     */
    static public function getDropDown($initial, array $filterBy, string $class, string $attribute)
    {
        $items = $class::filterBy($filterBy)->get()->map(function ($item) use ($attribute) {
            return new DropItem($item->id, $item->$attribute);
        })->toArray();
        $init = $class::find($initial) ?? new $class();
        $self = get_called_class();
        return new $self($items, $init->$attribute);
    }
}
