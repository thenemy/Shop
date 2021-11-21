<?php

namespace App\Http\Livewire\Components\CurrencyField;

use Livewire\Component;

class Currency extends Component
{
    public $ttt = "Default";

    public function render()
    {
        return view('livewire.components.currency-field.currency');
    }
}
