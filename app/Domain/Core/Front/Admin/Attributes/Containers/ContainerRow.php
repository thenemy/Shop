<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

class ContainerRow extends Container
{
    public function __construct(array $items, string $class = "")
    {
        parent::__construct($items, "flex flex-row space-x-2 " . $class);
    }
}
