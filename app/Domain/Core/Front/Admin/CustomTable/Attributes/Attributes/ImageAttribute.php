<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;

class ImageAttribute extends BaseAttributes
{
    public function __construct($entity, $key = "image")
    {
        parent::__construct($entity, $key);
    }

    public function getType(): int
    {
        return self::IMAGE_TYPE;
    }
}
