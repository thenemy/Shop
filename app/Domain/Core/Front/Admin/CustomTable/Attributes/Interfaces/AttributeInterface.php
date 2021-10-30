<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces;


interface AttributeInterface
{
    const IMAGE_TYPE = 1;
    const STRING_TYPE = 2;
    const STATUS_TYPE = 3;

    public function getType(): int;

}
