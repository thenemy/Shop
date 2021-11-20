<?php

namespace App\Http\Controllers\Base\Interfaces;

use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;

use App\Domain\Core\Front\Admin\Form\Abstracts\AbstractForm;
use App\Domain\Core\Main\Services\BaseService;

interface ControllerInterface
{

    public function getEntityClass(): string;

    public function getIndexEntity(): string;

    public function getCreateEntity(): string;

    public function getEditEntity(): string;

    public function getService(): BaseService;

    public function getTableClass(): string;

    public function getForm(): AbstractForm;


}
