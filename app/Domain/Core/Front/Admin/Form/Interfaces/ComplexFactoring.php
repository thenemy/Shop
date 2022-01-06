<?php

namespace App\Domain\Core\Front\Admin\Form\Interfaces;

use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireFactoring;

interface ComplexFactoring
{
    const INDEX = '$index';
    static public function initialize(BaseLivewireFactoring $factoring);

    static public function delete(BaseLivewireFactoring $factoring, $id);

    static public function create();

    static public function edit();
}
