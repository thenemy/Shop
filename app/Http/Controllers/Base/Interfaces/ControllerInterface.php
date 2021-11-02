<?php

namespace App\Http\Controllers\Base\Interfaces;

use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\Form\Models\Abstracts\AbstractForm;
use App\Domain\Core\Main\Services\BaseService;

interface ControllerInterface
{

    public function getEntityClass(): string;

    public function getService(): BaseService;

    public function getTable(): AbstractTable;

    public function getForm(): AbstractForm;


}
