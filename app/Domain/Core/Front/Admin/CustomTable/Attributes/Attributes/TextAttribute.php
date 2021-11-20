<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;

class TextAttribute extends BaseAttributes
{
    public function generateHtml()
    {
      return "<x-helper.text.title>sdasdsad </x-helper.text.title>";
    }
}
