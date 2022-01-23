<?php

namespace App\Domain\Payment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableActionInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Payment\Entities\Payment;
use App\Domain\Payment\Front\Admin\CustomTables\Actions\PaymentShowAction;
use App\Domain\Payment\Front\Admin\CustomTables\Tables\PaymentTable;

class PaymentIndex extends Payment implements CreateAttributesInterface, TableActionInterface
{
    public function getIdPurchaseAttribute(): string
    {
        return TextAttribute::generation($this, "purchase_id");
    }

    public function getAllSumIndexAttribute(): string
    {
        return TextAttribute::generation($this, "price");
    }

    public function getNumProductIndexAttribute(): string
    {
        return TextAttribute::generation($this, $this->purchase->number_purchase);
    }

    public function getClientIndexAttribute()
    {
        return TextAttribute::generation($this, $this->user->userCreditData->name, true);
    }

    public function getPhoneIndexAttribute()
    {
        return TextAttribute::generation($this, $this->user->phone, true);
    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("Payment", $this)
        ]);
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([
            PaymentShowAction::new([$this->id])
        ]);
    }

    public function getTableClass(): string
    {
        return PaymentTable::class;
    }
}
