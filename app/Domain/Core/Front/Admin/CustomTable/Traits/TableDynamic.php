<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGrayLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonRedLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Traits\SetInputAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Errors\DynamicTableException;
use App\Domain\CreditProduct\Front\DynamicTable\CreditDynamicIndex;
use App\Domain\CreditProduct\Services\CreditService;

trait TableDynamic
{
    use InputDynamicGeneration, FrontDynamicGeneration;

    /**
     * decide whether just to show entity or edit it
     */
    public function getInputsDecision($name, $decide)
    {
        if ($decide) {
            return $this->getInputs($name);
        } else {
            return $this->getFrontAttributes($name);
        }
    }


    public function getAddingCustomActions(): array
    {
        return [];
    }

    /**
     * title for opening container
     **/
    abstract public function getTitle(): string;


    public static function getDynamic($className, $parentId = "id"): FileLivewireDynamic
    {
        $class = get_called_class();
        return new FileLivewireDynamic(
            $className,
            new $class(),
            self::getBaseService(),
            self::getDynamicParentKey(),
            $parentId
        );
    }

    abstract public static function getBaseService(): string;

    /**
     * for filtration and insertion and displaying
     * thanks for comment
     */
    abstract public static function getDynamicParentKey(): string;
}
