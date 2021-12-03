<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;
use App\View\Components\Images\ImageTableComponent;

class ImageAttribute extends BaseAttributes
{


    public function __construct($entity, $key = "image", $value = false)
    {
        parent::__construct($entity, $key, $value);
    }

    public function generateHtml(): string
    {
        $image_component = new ImageTableComponent($this->getValueOfMainKey());
        return $image_component->render()->with($image_component->data());
    }
}
