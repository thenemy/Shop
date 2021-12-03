<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputLangAttribute extends BaseAttributeFromText
{
    public function __construct(string $key, string $label, bool $create = true)
    {
        parent::__construct($key, "", $label, $create);
    }

    public function generateHtml(): string
    {
        return sprintf("
            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            %s
            </x-helper.text.pre_title>
            <div class=' flex flex-row space-x-2'>
                 %s
             </div>
            </div>
            ",
            $this->label,
            $this->langGenerate("ru", "на русском языке") .
            $this->langGenerate("uz", "o`zbek tilda") .
            $this->langGenerate('en', 'in english')
        );
    }

    private function langGenerate(string $lang, string $labelContinue)
    {
        return sprintf("
           <x-helper.input.input name='%s[%s]'  label='%s' value='%s'/>
        ",
            $this->key,
            $lang,
            $labelContinue,
            $this->create ? sprintf(
                '{{old("%s") ? old("%s")["%s"] ?? "" : ""}}',
                $this->key,
                $this->key,
                $lang,
            ) : $this->getVariable() . '[\'' . $lang . '\']'
        );
    }
}
