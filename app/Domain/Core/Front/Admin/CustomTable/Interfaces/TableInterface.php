<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Interfaces;


use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;

interface TableInterface
{
    // ordering is important
    public function getNameOfColumns(): array;

    public function getRows($item): AbstractAttributes;
}
