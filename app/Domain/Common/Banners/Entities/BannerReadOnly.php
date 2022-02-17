<?php

namespace App\Domain\Common\Banners\Entities;

class BannerReadOnly extends Banner
{
    public function toArray()
    {
        return [
            "link" => $this->link,
            "image" => $this->getImageCurrentAttribute()->fullPath()
        ];
    }

    public static function getCreateRules(): array
    {
        return [
            "image" => "required"
        ];
    }
}
