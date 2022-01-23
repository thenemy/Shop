<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

use App\Domain\Core\Front\Admin\Attributes\Text\Text;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

class   ModalCreator implements HtmlInterface
{
    private HtmlInterface $html;
    private ModalContainer $modal;

    public function __construct(HtmlInterface $html, ModalContainer $modal)
    {
        $this->html = $html;
        $this->modal = $modal;
    }

    static public function new(HtmlInterface $html, ModalContainer $creator)
    {
        return new self($html, $creator);
    }

    public function generateHtml(): string
    {
        return Container::new([
            'x-data' => "modalWindow()"
        ], [
            $this->html,
            $this->modal,
        ])->generateHtml();
    }
}
