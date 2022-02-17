<?php

namespace App\Http\Controllers\Api\Traits;

use App\Domain\Category\Api\CategoryAppBar;

trait CommonComponents
{
    protected function getHeader(): array
    {
        return [
            "header" => [
                "drop_bar" => CategoryAppBar::active()->get(),
                "nav_bar" => CategoryAppBar::active()->take(7)->get()
            ],
        ];
    }
    protected function connectWithCommon($array): array
    {
        return array_merge($array, $this->getHeader());
    }
}
