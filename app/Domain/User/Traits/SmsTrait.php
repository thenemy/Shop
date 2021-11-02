<?php

namespace App\Domain\User\Traits;

trait SmsTrait
{
    public function markSms()
    {
        $this->phone_verified_at = now();
        $this->save();
    }
}
