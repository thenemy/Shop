<?php

namespace App\Http\Livewire\Admin\Pages\Product;  // 1  --- namespace
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireFactoring;

class ProductEdit extends BaseLivewireFactoring
{

    function getPath()
    {
        return 'livewire.admin.pages.product.product-edit';
    }
}
