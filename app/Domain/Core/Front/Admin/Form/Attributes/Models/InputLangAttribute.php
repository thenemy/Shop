<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeFromText;

class InputLangAttribute extends BaseAttributeFromText
{
    public $model = "";

    public function __construct(string $key, string $label, bool $create = true, $model = "")
    {
        parent::__construct($key, "", $label, $create);
        $this->model = $model;
    }

    protected function getContainer()
    {
        return " <div class=' flex flex-row space-x-2'>
                 %s
             </div>";
    }

    private function getBase()
    {
        return sprintf("
            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            %s
            </x-helper.text.pre_title>
                %s
            </div>
            ", $this->label, $this->getContainer());
    }


    public function generateHtml(): string
    {
        return sprintf($this->getBase(),
            $this->langGenerate("ru", "на русском языке") .
            $this->langGenerate("uz", "o`zbek tilda") .
            $this->langGenerate('en', 'in english')
        );
    }

    protected function generateCreateValue($lang)
    {
        return sprintf(
            '{{old("%s") ? old("%s")["%s"] ?? "" : ""}}',
            $this->key,
            $this->key,
            $lang,
        );
    }

    protected function generateEditValue($lang)
    {
        $current = $this->getWithoutScopeAtrVariable($this->key . '["' . $lang . '"]');
        return sprintf(
            '{{old("%s") ? old("%s")["%s"] ?? %s ?? " " : %s ?? " "}}',
            $this->key,
            $this->key,
            $lang,
            $current,
            $current
        );
    }

    private function langGenerate(string $lang, string $labelContinue)
    {
        $update = $this->generateEditValue($lang);
        return sprintf(
            $this->getComponent(),
            $this->key,
            $lang,
            $labelContinue,
            $update,
            $this->getModel($lang)
        );
    }

    private function getModel(string $lang)
    {
        if ($this->model)
            return sprintf("x-model=%s.%s", $this->model, $lang);
        return "";
    }

    protected function getComponent(): string
    {
        return "<x-helper.input.input name='%s[%s]'  label='{{__(\"%s\")}}' value='%s' %s/>";
    }
}
