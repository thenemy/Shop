<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes;


use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\BaseAttributes;

abstract class StatusAttribute extends BaseAttributes
{

    abstract public function color():string;

}
