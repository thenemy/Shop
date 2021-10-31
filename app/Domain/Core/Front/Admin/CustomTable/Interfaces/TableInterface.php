<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Interfaces;


use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;

interface TableInterface
{
    // ordering is important
    public function getColumnsName(): array;

    public function getRowsName($item): AbstractAttributes;
}
