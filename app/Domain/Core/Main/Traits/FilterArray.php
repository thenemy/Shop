<?php

namespace App\Domain\Core\Main\Traits;

trait FilterArray
{
    static public function filterRecursive(array $data, callable $filter = null): array
    {
        return array_filter($data, function ($item) use ($filter) {
            $item = is_array($item) ? self::filterRecursive($item, $filter) : $item;
            return isset($filter) ? $filter($item) : isset($item) && !empty($item);
        });
    }
}
