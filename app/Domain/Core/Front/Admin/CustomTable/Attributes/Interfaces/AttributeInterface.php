<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces;


interface AttributeInterface
{
    public function generateHtml();

    public function getValue();


    static public function preGenerate($entity, $key);
}
