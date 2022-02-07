<?php

namespace App\Http\Livewire\Admin\Pages\ProductEdit;  // 1  --- namespace
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireFactoring;

class HeaderTextAttribute extends BaseLivewireFactoring
{
        
 public function fillObjects(){return \App\Domain\Product\Product\Front\Admin\Functions\HeaderTextFunction::fillObjects($this,...func_get_args());}public function render(){return \App\Domain\Product\Product\Front\Admin\Functions\HeaderTextFunction::render($this,...func_get_args());}


    function getPath()
    {
        return 'livewire.admin.pages.product-edit.header-text-attribute';
    }

}
