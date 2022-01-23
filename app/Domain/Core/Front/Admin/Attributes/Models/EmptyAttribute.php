<?php

namespace App\Domain\Core\Front\Admin\Attributes\Models;

use App\Domain\Core\Front\Interfaces\HtmlInterface;

class EmptyAttribute implements HtmlInterface
{
    public static function new(): EmptyAttribute
    {
        $self = get_called_class();
        return new $self();
    }

    public function generateHtml(): string
    {
        return "";
    }
}
