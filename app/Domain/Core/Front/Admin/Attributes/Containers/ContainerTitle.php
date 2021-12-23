<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

class ContainerTitle extends Container
{
    public string $title;

    static public function newTitle(string $title, string $class = '', array $items = [])
    {
        $object = self::new($class, $items);
        $object->title = $title;
        return $object;
    }

    public function generateHtml(): string
    {
        return sprintf(
            "
            <div class='%s'>
            <span class='font-bold text-lg'>%s</span>
                %s
            </div>", $this->class, $this->title, $this->generateItems());
    }
}
