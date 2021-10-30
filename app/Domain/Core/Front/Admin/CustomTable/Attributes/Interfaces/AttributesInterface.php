<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\AbstractActions;

interface AttributesInterface
{
    public function getAttributes($entity): array;

    public function getActions($entity):array;

}
