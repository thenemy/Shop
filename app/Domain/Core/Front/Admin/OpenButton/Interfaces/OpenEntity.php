<?php

namespace App\Domain\Core\Front\Admin\OpenButton\Interfaces;

interface OpenEntity
{
    /**
     * for parent entity to be filter according to it
     */
    public function getKeyForFilter();
}
