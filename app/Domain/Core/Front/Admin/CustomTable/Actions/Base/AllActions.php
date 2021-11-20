<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Base;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class AllActions implements HtmlInterface
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function generateHtml(): string
    {
        $str = "";
        foreach ($this->items as $item) {
            $str = $str . " " . $item->generateHtml();
        }
        return $str;
    }
}
