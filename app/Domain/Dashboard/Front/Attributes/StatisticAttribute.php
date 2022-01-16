<?php

namespace App\Domain\Dashboard\Front\Attributes;

use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\FontIcon\FontIconAttribute;
use App\Domain\Core\Front\Admin\Attributes\Text\Text;
use App\Domain\Core\Front\Admin\Button\Traits\GenerateTagAttributes;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

class StatisticAttribute implements HtmlInterface
{
    use GenerateTagAttributes, AttributeGetVariable;

    public string $icon;
    public string $counter;
    public string $title;

    public function __construct($icon, $counter, $title, array $attributes)
    {
        $this->icon = $icon;
        $this->counter = $counter;
        $this->title = $title;
        $this->attributes = $attributes;
    }

    public static function new(string $icon, string $counter, string $title, array $attributes = [])
    {
        return new self($icon, $counter, $title, $attributes);
    }

    public static function newLink(string $icon, string $counter, string $title, string $link): StatisticAttribute
    {
        return new self($icon, $counter, $title, ["class" => "cursor-pointer",
            "onclick" => sprintf("location.href =\"{{%s}}\"", $link)]);
    }

    public function generateHtml(): string
    {
        return ContainerRow::generate(
            self::append($this->attributes, ['class' => "space-x-6 p-5 items-center "]),
            [
                FontIconAttribute::new([
                    'class' => $this->icon . ' text-4xl text-[#bebebe]'
                ]),
                ContainerColumn::new([
                    'class' => "space-y-0.5 items-center"
                ], [
                    Text::new(self::getScope($this->counter), [
                        "class" => "font-bold text-2xl"
                    ]),
                    Text::new(self::getLangScope($this->title), [
                        'class' => "text-xs text-center"
                    ])
                ])
            ]);
    }
}
