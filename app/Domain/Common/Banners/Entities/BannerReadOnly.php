<?php

namespace App\Domain\Common\Banners\Entities;

class BannerReadOnly extends Banner
{
    public function toArray()
    {
        return [
            "link" => $this->link,
            "image" => [
                'ru' => $this->getImageRuAttribute()->fullPath(),
                "en" => $this->getImageEnAttribute()->fullPath(),
                "uz" => $this->getImageUzAttribute()->fullPath()
            ],
        ];
    }

    public static function getCreateRules(): array
    {
        return [
            "image" => "required"
        ];
    }
}
