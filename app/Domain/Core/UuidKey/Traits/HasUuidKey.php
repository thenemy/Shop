<?php

namespace App\Domain\Core\UuidKey\Traits;


use Ramsey\Uuid\Uuid;

trait HasUuidKey
{
    protected static function bootHasUuidKey()
    {
        static::creating(function ($entity) {
            $entity->setAttribute($entity->getPrimary(), $entity->generateUuidKey());
        });
    }

    /**
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * @return bool
     */
    public function isIncrementing(): bool
    {
        return false;
    }


    public function getPrimary(): string
    {
        return "id";
    }
    protected function generateUuidKey(): string
    {
        return Uuid::uuid4();
    }
}
