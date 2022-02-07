<?php

namespace App\Domain\Core\File\Models\Livewire;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class LivewireDynamic implements HtmlInterface
{
    public string $path;
    public function __construct(FileLivewireCreator $creator)
    {
        $this->path = $creator->generateHtmlPath();
    }

    public function generateHtml(): string
    {
        return  \Livewire\Livewire::mount($this->path)->html();
    }
}
