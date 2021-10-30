<?php

namespace App\Http\Livewire\Helper\Layout;

use App\View\Helper\PATH\Traits\PathHandler;
use Livewire\Component;

class Layout extends Component
{
    use PathHandler;

    public $drop_down;
    public $test_array = [
        0 => [
            "asd",
            "Asfgs",
            "agsss"
        ],
        1 => [
            "Ahfhfh",
            "12",
            "2152"
        ],
        2 => [
            "233",
            "33",
            "33"
        ],
    ];
    public $chosen = [[0, 1]];
    public $str;

    public function mount()
    {
        $this->chosen = array_merge(...array_values($this->test_array));
    }

    public function updateModel($id, $path)
    {

        $this->chosen = $this->test_array[$id];

        $this->drop_down = $this->decodePath($path)::getDropDownLivewire();
    }

    public function render()
    {

        return view('livewire.admin.helper.layout.layout');
    }
}
