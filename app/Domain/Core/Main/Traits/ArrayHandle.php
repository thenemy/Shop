<?php

namespace App\Domain\Core\Main\Traits;

trait ArrayHandle
{

    public function arrayToString(array $data): string
    {
        $str = "\"[";
        foreach ($data as $key => $item) {
            $str = $str . sprintf('\'%s\' => %s,', $key, $item);
        }
        return $str . "]\"";
    }

    public function arrayToStringWithoutQuotes(array $data): string
    {
        $str = "[";
        foreach ($data as $key => $item) {
            $str = $str . sprintf('"%s" => %s,', $key, $item);
        }
        return $str . "]";
    }
}
