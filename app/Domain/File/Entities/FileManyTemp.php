<?php

namespace App\Domain\File\Entities;

use App\Domain\Core\Front\Admin\File\Attributes\FilesAttributes;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaManyTrait;
use App\Domain\File\Interfaces\FileTempInterface;

class FileManyTemp extends Entity implements FileTempInterface
{
    use MediaManyTrait;

    protected $table = 'file_many';

    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FileTemp::class, "file_id");
    }

    public function getFilesMediaAttribute()
    {
        return $this->getManyMedia("files", "file");
    }

    public function getFileUpload()
    {
        return $this->files->map(function ($item) {
            return $item->getFileUpload();
        });
    }

        public function getFileCreateAttribute()
    {
        return new FilesAttributes(
            $this,
            "files",
            $this->id,
            FileTemp::class,
            "file",
            "file_id"
        );
    }
}