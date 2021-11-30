<?php

namespace App\Http\Livewire\Components\CurrencyField;

use Livewire\Component;

class Currency extends Component
{
    public string $currency = "";

    public function render()
    {
        return view('livewire.components.currency-field.currency');
    }
}
