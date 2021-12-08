<?php

namespace App\Domain\User\Front\Open;

use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableFilterByInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\OpenButton\Interfaces\OpenEntity;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Main\Traits\ArrayHandle;
use App\Domain\User\Entities\Surety;
use App\Domain\User\Interfaces\SuretyRelationInterface;
use App\Domain\User\Interfaces\UserRelationInterface;

class SuretyOpenCreate extends Surety implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("phone", "text", "Телефон пользователя"),
            new InputAttribute(
                'additional_phone',
                "text",
                "Дополнительный телефон"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "firstname",
                "text", "Имя пользователя"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "lastname",
                "text", "Фамилия пользователя"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "father_name",
                "text", "Отчество пользователя"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'series',
                "text", "Паспорт серия"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'pnfl',
                "text", "ПНФЛ"),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'date_of_birth',
                "date", "Дата рождения"),
            new InputFileTempAttribute(
                self::CRUCIAL_DATA
                . "passport_reverse",
                "Прописка"),
            new InputFileTempAttribute(
                self::CRUCIAL_DATA
                . "user_passport",
                "Паспорт c пользователем"),
            new InputFileTempAttribute(
                self::CRUCIAL_DATA
                . 'passport',
                "Паспорт пользователя"),
        ]);
    }
}
