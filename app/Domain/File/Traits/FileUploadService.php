<?php

namespace App\Domain\File\Traits;

use Illuminate\Support\Facades\Log;

trait FileUploadService
{
    /**
     * <input name="file-id_file-{{$keyToAttach}}" value="{{$entityId}}">
     * <input name="file-class_name-{{$keyToAttach}}" value="{{$entityClass}}">
     */
    public function serializeTempFile(array &$objectData)
    {
        $file_class = $this->popCondition($objectData, "file");
        $file_id = $this->popCondition($file_class, "id_file");
        foreach ($file_id as $key => $value) {

            // decides to use FileTemp or FileManyTemp
            $tempClass = $file_class['class_name' . \CR::CR . $key];
            $objectData[$key] = $tempClass::find($value)->getFileUpload();
        }
    }
}
