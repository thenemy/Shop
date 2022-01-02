<?php

namespace App\Domain\Core\File\Interfaces;

interface CreatorInterface
{
    public function getEntityClass(): string;

    public function getIndexEntity(): string;

    public function getCreateEntity(): string;

    public function getEditEntity(): string;

    public function getShowEntity(): string;
}
