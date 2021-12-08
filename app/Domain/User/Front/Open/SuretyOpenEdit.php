<?php

namespace App\Domain\User\Front\Open;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\Surety;
use App\Domain\User\Front\Dynamic\SuretyPlasticCardDynamic;
use App\Domain\User\Interfaces\SuretyRelationInterface;
use App\Domain\User\Interfaces\UserRelationInterface;

class SuretyOpenEdit extends Surety implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("phone", "text", "Телефон пользователя", false),
            new InputAttribute(
                'additional_phone',
                "text",
                "Дополнительный телефон", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "firstname",
                "text", "Имя пользователя", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "lastname",
                "text", "Фамилия пользователя", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . "father_name",
                "text", "Отчество пользователя", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'series',
                "text", "Паспорт серия", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'pnfl',
                "text", "ПНФЛ", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'date_of_birth',
                "date", "Дата рождения",
                false),
            new InputFileAttribute(
                "passport_reverse_edit",
                "Прописка",
                self::class),
            new InputFileAttribute(
                "passport_user_edit",
                "Паспорт c пользователем",
                self::class,),
            new InputFileAttribute(
                'passport_edit',
                "Паспорт пользователя",
                self::class),
            SuretyPlasticCardDynamic::getDynamic('SuretyOpenEdit')
        ]);
    }

    public function getPassportReverseEditAttribute()
    {
        return new FileAttribute(
            $this[self::CRUCIAL_DATA_SERVICE],
            'passport_reverse',
            'passport_reverse_1'
        );
    }

    public function getPassportUserEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::CRUCIAL_DATA_SERVICE],
            "user_passport",
            "passport_1",
        );
    }

    public function getPassportEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::CRUCIAL_DATA_SERVICE],
            'passport',
            'user_passport_1'
        );
    }
}
