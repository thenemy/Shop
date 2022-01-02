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
use App\Domain\CreditProduct\Front\Dynamic\CreditDynamicIndex;
use App\Domain\CreditProduct\Services\CreditService;

trait TableDynamic
{
    use TableDynamicWithoutEntity;

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

    public static function getPrefixInputHidden(): string
    {
        return "";
    }

    /**
     * Service which will be responsible for creation edition and deletion
     */
    abstract public static function getBaseService(): string;

    /**
     * for filtration and insertion and displaying
     * thanks for comment
     */
    abstract public static function getDynamicParentKey(): string;
}
