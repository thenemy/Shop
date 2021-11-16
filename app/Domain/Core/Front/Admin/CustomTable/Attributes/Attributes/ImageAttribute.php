<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;

class ImageAttribute extends BaseAttributes
{
    public function __construct($entity, $key = "image")
    {
        parent::__construct($entity, $key);
    }


    public function generateHtml(): string
    {
        return sprintf("<x-helper.image.image_table value='%s' />", $this->getValue());
    }
}
