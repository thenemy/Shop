<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class Container implements HtmlInterface
{
    public array $items;
    public string $class;

    public function __construct(array $items, string $class = "")
    {
        $this->items = $items;
        $this->class = $class;
    }

    static public function new(string $class = "", array $item = [])
    {
        $self = get_called_class();
        return new $self($item, $class);
    }

    static public function generate(string $class = "", array $item = [])
    {
        return self::new($class, $item)->generateHtml();
    }

    protected function generateItems(): string
    {
        $str = "";
        foreach ($this->items as $item) {
            $str = $str . "\t\t\t\n" . $item->generateHtml();
        }
        return $str;
    }

    public function generateHtml(): string
    {

        return sprintf(
            "
            <div class='%s'>
                %s
            </div>", $this->class, $this->generateItems());
    }
}
