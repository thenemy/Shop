<?php

namespace App\Domain\Core\Media\Traits;

trait MediaManyTrait
{
    public function getManyMedia($parentKey, $mediaKey)
    {
        $images = $this->$parentKey->map(function ($item) use ($mediaKey) {
            return $item->$mediaKey;
        })->toArray();
        return $images;
    }

    public function setManyMedia($inputs,
                                 $childClass,
                                 $key,
                                 $associate
    )
    {
        foreach ($inputs as $input) {
            $childEntity = new $childClass();
            $childEntity->$key = $input;
            $childEntity->$associate = $this->id;
            $childEntity->save();
        }
    }
}
