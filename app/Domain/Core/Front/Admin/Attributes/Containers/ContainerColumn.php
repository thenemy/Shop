<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

class ContainerColumn extends Container
{
    public function __construct(array $items, string $class = "")
    {
        parent::__construct($items, "flex flex-col  space-y-2 " . $class);
    }
}
