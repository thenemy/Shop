<?php

namespace App\Domain\Core\Front\Admin\Attributes\Interfaces;

interface AttributeLivewireFunction
{
    public function formattedData(...$value);

    public function getFunction(): string;

    public function getFormat(): string;
}
