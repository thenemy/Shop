<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NewLivewire extends Component
{
    public $checkBox;
    public $checks;

    public function mount()
    {
        $this->checkBox = collect([]);
        $this->checks = [];

    }


    public function callFunc()
    {
        dd($this->checkBox);
        $this->checks = $this->checkBox;
    }

    public function render()
    {
        return view('livewire.asd');
    }
}
