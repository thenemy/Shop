<?php

namespace App\Domain\Core\Main\Services;

class FrontService extends BaseService
{
    private $class_name;

    public function __construct($class_name)
    {
        $this->class_name = $class_name;
        parent::__construct();
    }

    public function getEntity()
    {
        return $this->class_name;
    }
}
