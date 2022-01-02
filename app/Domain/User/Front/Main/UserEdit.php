<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\CrucialData;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\DropDown\SexDropDown;
use App\Domain\User\Front\Dynamic\PlasticCardDynamic;
use App\Domain\User\Interfaces\UserRelationInterface;

class UserEdit extends User implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("phone", "text", "Телефон пользователя", false),
            new InputAttribute(
                self::USER_DATA . 'additional_phone',
                "text",
                "Дополнительный телефон", false),
            new InputAttribute("password", "password", "Пароль"),
            new InputAttribute(
                self::CRUCIAL_DATA . "firstname",
                "text", "Имя пользователя", false),
            new InputAttribute(
                self::CRUCIAL_DATA . "lastname",
                "text", "Фамилия пользователя", false),
            new InputAttribute(
                self::CRUCIAL_DATA . "father_name",
                "text", "Отчество пользователя", false),
            SexDropDown::new(false),
            new InputAttribute(
                self::CRUCIAL_DATA . 'series',
                "text", "Паспорт серия", false),
            new InputAttribute(
                self::CRUCIAL_DATA
                . 'date_of_birth',
                "date", "Дата рождения", false),
            new InputAttribute(
                self::CRUCIAL_DATA . 'pnfl',
                "text", "ПНФЛ", false),
            new InputFileAttribute(
                'avatar_edit',
                "Аватар",
                self::class),
            new InputFileAttribute(
                'passport_edit',
                "Паспорт",
                self::class
            ),
            new InputFileAttribute(
                "passport_reverse_edit",
                "Прописка",
                self::class),

            new InputFileAttribute(
                "passport_user_edit",
                "Паспорт c пользователем",
                self::class,),
            PlasticCardDynamic::getDynamic("UserEdit")
        ]);
    }

    public function getAvatarEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::AVATAR_SERVICE],
            "avatar",
            "avatar_1",
        );
    }

    public function getPassportReverseEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::USER_DATA_SERVICE][self::CRUCIAL_DATA_SERVICE],
            "passport_reverse",
            "passerp_1",
        );
    }

    public function getPassportUserEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::USER_DATA_SERVICE][self::CRUCIAL_DATA_SERVICE],
            "user_passport",
            "passport_1",
        );
    }

    public function getPassportEditAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::USER_DATA_SERVICE][self::CRUCIAL_DATA_SERVICE],
            'passport',
            'user_passport_1'
        );
    }
}
