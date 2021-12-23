<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class NestedContainer implements HtmlInterface
{
    public string $title;
    public array $items;

    public function __construct(string $title, array $items = [])
    {
        $this->items = $items;
        $this->title = $title;
    }

    static public function new(string $title, array $items = [])
    {
        $self = get_called_class();
        return new $self($title, $items);
    }

    public function generateHtml(): string
    {
        $str = "";
        foreach ($this->items as $item) {
            $str = $str . "\t\t\t\n" . $item->generateHtml();
        }
        return sprintf(
            "<x-helper.container.container title='%s' class='flex flex-wrap justify-between'>
                %s
                </x-helper.container.container>",
            $this->title,
            $str
        );
    }
}
