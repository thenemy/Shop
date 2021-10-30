<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;

class TextAttribute extends BaseAttributes
{
    public function getType():int
    {
        return self::STRING_TYPE;
    }
}
