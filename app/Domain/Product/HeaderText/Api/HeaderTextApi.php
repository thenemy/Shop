<?php

namespace App\Domain\Product\HeaderText\Api;

use App\Domain\Product\HeaderText\Entities\HeaderText;

class HeaderTextApi extends HeaderText
{
    public function toArray()
    {
        return [
            "header" => $this->text_current,
            "values" => $this->pivot->toArray()
        ];
    }
}
