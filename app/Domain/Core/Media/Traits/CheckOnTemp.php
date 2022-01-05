<?php

namespace App\Domain\Core\Media\Traits;

trait CheckOnTemp
{
    protected function isFileNotExists($inserted, $previous)
    {
        if ($previous) {
            $old = preg_replace("/\//i", "\/", $previous);
            $new = preg_replace("/\\\/i", "/", $inserted->path());
            return !preg_match("/" . $old . "/i", $new);
        }
        return true;
    }
}
