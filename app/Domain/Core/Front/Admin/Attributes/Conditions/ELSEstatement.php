<?php

namespace App\Domain\Core\Front\Admin\Attributes\Conditions;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class ELSEstatement implements HtmlInterface
{
    private HtmlInterface $block;

    public function __construct(HtmlInterface $block)
    {
        $this->block = $block;
    }

    static public function new(HtmlInterface $block)
    {
        return new self($block);
    }

    public function generateHtml(): string
    {
        return sprintf("@else %s", $this->block->generateHtml());
    }
}
