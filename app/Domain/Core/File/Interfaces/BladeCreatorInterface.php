<?php

namespace App\Domain\Core\File\Interfaces;

interface BladeCreatorInterface
{
    const BASE = "resources/views/admin/";
    const FROM = self::BASE . "template/base/";
    const TO = self::BASE . "pages/";

    const INDEX = "index.blade.php";
    const CREATE = "create.blade.php";
    const EDIT = "edit.blade.php";
    const CHOOSE = "choose.blade.php";

    /**
     * @params  first  --- Title
     *          second --- Livewire
     */
    const FROM_INDEX = self::FROM . self::INDEX; // include livewire



    const FROM_EDIT = self::FROM . self::EDIT;
    const FROM_CREATE = self::FROM . self::CREATE;
    const FROM_CHOOSE = self::FROM . self::CHOOSE;


    public function openFile();

}
