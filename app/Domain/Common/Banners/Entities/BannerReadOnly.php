<?php

namespace App\Domain\Common\Banners\Entities;

class BannerReadOnly extends Banner
{
    public function toArray()
    {
        return [
            "link" => $this->link,
            "image" => [
                'ru' => url($this->getImageRuAttribute()->storage()),
                "en" => url($this->getImageEnAttribute()->storage()),
                "uz" => url($this->getImageUzAttribute()->storage())
            ],
        ];
    }
}
