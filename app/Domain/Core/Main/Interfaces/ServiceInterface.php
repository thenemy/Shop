<?php


namespace App\Domain\Core\Main\Interfaces;

use App\Domain\Core\Main\Entities\Entity;

interface ServiceInterface
{
    public function create(array $object_data);

    public function update(Entity $object, array $object_data);

    public function destroy(Entity $object): bool;
}
