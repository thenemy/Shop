<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

class ContainerRow extends Container
{
    public function __construct(array $items, array $attribute)
    {
        parent::__construct($items, $this->append(['class' => "flex flex-row  space-x-2"], $attribute));
    }
}
