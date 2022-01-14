<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Interfaces\BladeActionsInterface;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\Front\Admin\Blade\Base\AllBladeActions;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\StatusAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\CustomTables\Actions\TakenCreditEditAction;
use App\Domain\Installment\Front\Admin\CustomTables\Tables\TakenCreditTable;
use App\Domain\SchemaSms\Entities\SchemaSmsInstallment;
use App\Domain\SchemaSms\Front\Attribute\SchemaSmsAttribute;

class TakenCreditIndex extends TakenCredit implements TableInFront, CreateAttributesInterface, BladeActionsInterface
{

    public function getIdPurchaseAttribute()
    {
        return TextAttribute::generation($this, $this->purchase_id);
    }

    public function getAllSumIndexAttribute()
    {
        return TextAttribute::generation($this, $this->purchase->price);
    }

    public function getClientIndexAttribute()
    {
        return TextAttribute::generation($this, $this->userData->full_name);
    }

    public function getPhoneIndexAttribute()
    {
        return TextAttribute::generation($this, $this->userData->phone);
    }

    public function getDateCreationIndexAttribute()
    {
        return TextAttribute::generation($this, $this->created_at);
    }

    public function getDateApprovalIndexAttribute()
    {
        return TextAttribute::generation($this, $this->date_taken);
    }

    public function getDateFinishIndexAttribute()
    {
        return TextAttribute::generation($this, $this->date_finish);
    }

    public function getStatusIndexAttribute()
    {
        return (new StatusAttribute($this, "status", "statusIndex"))->generateHtml();
    }

    public function setStatusHandleAttribute($value)
    {

    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("TakenCredit", $this),
        ]);
    }

    public function getTableClass(): string
    {
        return TakenCreditTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([

        ]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation(
            [

            ]
        );
    }

    public function getTitle(): string
    {
        return "Рассрочка";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([
            TakenCreditEditAction::new([$this->id]),
        ]);
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([

        ]);
    }

    public function getBladeActions(): string
    {
        return AllBladeActions::generation([
            SchemaSmsAttribute::new(SchemaSmsInstallment::class)
        ]);
    }
}
