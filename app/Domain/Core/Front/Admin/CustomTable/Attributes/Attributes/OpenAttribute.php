<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\View\Components\Actions\BlueOpen;

class OpenAttribute implements HtmlInterface
{
    public string $href;

    public string $slot;
    public function __construct(string $href, string $slot)
    {
        $this->slot = $slot;
        $this->href = $href;
    }

    public function generateHtml(): string
    {
        $button = new BlueOpen($this->slot, $this->href);
        return  $button->render()->with($button->data());
    }
}
