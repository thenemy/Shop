<?php

namespace App\Domain\Core\Media\Traits;

use Illuminate\Http\UploadedFile;

// be cautious because some symbols has to be remove before checking
trait CheckOnTemp
{
    protected function isFileNotExists($inserted, $previous)
    {
        if ($previous) {
            $old = preg_replace("/[^A-Za-z0-9]/i", "", $previous);
            $new = preg_replace("/[^A-Za-z0-9]/i", "", $inserted->path());
            return !preg_match("/" . $old . "/i", $new);
        }
        return true;
    }
}
