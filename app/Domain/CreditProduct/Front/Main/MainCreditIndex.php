<?php

namespace App\Domain\CreditProduct\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\File\Models\Main\FileBladeCreatorIndex;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
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
        return TextAttribute::generation($this, "name");
    }

    public function getInitialPriceIndexAttribute()
    {
        return TextAttribute::generation($this, $this->initial_percent . " " . "%", true);
    }

    public function getInitialMonthIndexAttribute()
    {
        $text = __("Нету");
        if ($this->credits()->exists()) {
            $credit = $this->credits()->orderBy('month')->get();
            if ($this->credits()->count() == 1) {
                $text = $credit->first()->month;
            } else {
                $text = __('от') . " " . $credit->first()->month . " "
                    . __("до") . " " . $credit->last()->month;
            }
        }

        return TextAttribute::generation($this, $text, true);
    }

    public function getTableClass(): string
    {
        return MainCreditTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([

        ]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation([

        ]);
    }

    public function getTitle(): string
    {
        return "Рассрочки";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([
            MainCreditEditAction::new([$this->id]),
        ]);
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([

        ]);
    }
}
