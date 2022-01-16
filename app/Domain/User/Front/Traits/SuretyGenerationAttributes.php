<?php

namespace App\Domain\User\Front\Traits;

use App\Domain\Core\Front\Admin\Attributes\Conditions\ELSEstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\ConcatenateHtml;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Front\Dynamic\SuretyPlasticCardDynamic;
use App\Domain\User\Front\Open\SuretyOpenEdit;
use App\Domain\User\Interfaces\SuretyRelationInterface;

trait SuretyGenerationAttributes
{
    use AttributeGetVariable;

    static public function generationSuretyEdit(string $relation = ""): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute($relation . "phone", "text", "Телефон пользователя", false),
            new InputAttribute(
                $relation . 'additional_phone',
                "text",
                "Дополнительный телефон", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "firstname",
                "text", "Имя пользователя", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "lastname",
                "text", "Фамилия пользователя", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "father_name",
                "text", "Отчество пользователя", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'series',
                "text", "Паспорт серия", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'pnfl',
                "text", "ПНФЛ", false),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'date_of_birth',
                "date", "Дата рождения",
                false),
            IFstatement::new(self::getWithoutScopeAtrVariable($relation),
                ConcatenateHtml::new(self::generateEditFiles($relation))),
            ELSEstatement::new(
                ConcatenateHtml::new(self::generateCreateFile($relation))),
            ENDIFstatement::new()
        ]);
    }

    static private function generateEditFiles($relation)
    {
        return [
            new InputFileAttribute(
                $relation . "passport_reverse_edit",
                "Прописка",
                SuretyOpenEdit::class),
            new InputFileAttribute(
                $relation . "passport_user_edit",
                "Паспорт c пользователем",
                SuretyOpenEdit::class,),
            new InputFileAttribute(
                $relation . 'passport_edit',
                "Паспорт пользователя",
                SuretyOpenEdit::class),
            SuretyPlasticCardDynamic::getDynamic('SuretyOpenEdit')
        ];
    }

    static private function generateCreateFile(string $relation)
    {
        return [
            new InputFileTempAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "passport_reverse",
                "Прописка"),
            new InputFileTempAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "user_passport",
                "Паспорт c пользователем"),
            new InputFileTempAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'passport',
                "Паспорт пользователя"),
        ];
    }

    static public function generationSuretyCreate(string $relation = ""): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute(
                $relation . "phone",
                "text",
                "Телефон пользователя"),
            new InputAttribute(
                $relation . 'additional_phone',
                "text",
                "Дополнительный телефон"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "firstname",
                "text", "Имя пользователя"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "lastname",
                "text", "Фамилия пользователя"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . "father_name",
                "text", "Отчество пользователя"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'series',
                "text", "Паспорт серия"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'pnfl',
                "text", "ПНФЛ"),
            new InputAttribute(
                $relation . SuretyRelationInterface::CRUCIAL_DATA
                . 'date_of_birth',
                "date", "Дата рождения"),
            ...self::generateCreateFile($relation)
        ]);
    }


    public function getPassportReverseEdit($relation = "")
    {

        return new FileAttribute(
            $this->suretyRelationGet($relation),
            'passport_reverse',
            'passport_reverse_1'
        );
    }

    private function suretyRelationGet($relation = "")
    {
        if ($relation) {
            return $this[$relation][SuretyRelationInterface::CRUCIAL_DATA_SERVICE];
        }
        return $this[SuretyRelationInterface::CRUCIAL_DATA_SERVICE];
    }

    public function getPassportUserEdit($relation = ""): FileAttribute
    {
        return new FileAttribute(
            $this->suretyRelationGet($relation),
            "user_passport",
            "passport_1",
        );
    }

    public function getPassportEdit($relation = ""): FileAttribute
    {
        return new FileAttribute(
            $this->getRelation($relation),
            'passport',
            'user_passport_1'
        );
    }
}
