<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;
use App\Http\Livewire\Admin\Asd;
use App\Http\Livewire\NewLivewire;
use App\View\Components\Test;
use Livewire\Livewire;

class TextAttribute extends BaseAttributes
{
    public function generateHtml()
    {
        $text = new Test("adadasfasfas");
        return $text->render()->with($text->data());
    }
}
