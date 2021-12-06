<?php

namespace App\Domain\CreditProduct\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\File\Models\Main\FileBladeCreatorIndex;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Entity\MainCredit;
use App\Domain\CreditProduct\Front\Admin\Actions\MainCreditEditAction;
use App\Domain\CreditProduct\Front\Admin\Table\MainCreditTable;

class MainCreditIndex extends MainCredit implements TableInFront, CreateAttributesInterface
{
    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("MainCredit", $this)
        ]);
    }

    public function getNameIndexAttribute()
    {
        return TextAttribute::preGenerate($this, "name");
    }

    public function getInitialPriceIndexAttribute()
    {
        return TextAttribute::preGenerate($this, $this->initial_percent . " " . "%", true);
    }

    public function getInitialMonthIndexAttribute()
    {
        $text = __("Нету");
        if ($this->credits()->exists()) {
            if ($this->credits()->count() == 1) {
                $text = $this->credits->first()->month;
            } else {
                $text = __('от') . " " . $this->credits->first()->month . " "
                    . __("до") . " " . $this->credits->last()->month;
            }
        }

        return TextAttribute::preGenerate($this, $text, true);
    }

    public function getTableClass(): string
    {
        return MainCreditTable::class;
    }

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return LivewireFunctions::new([

        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return LivewireDropOptional::new([

        ]);
    }

    public function getTitle(): string
    {
        return "Рассрочки";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::new([
            MainCreditEditAction::new([$this->id]),
        ]);
    }
}
