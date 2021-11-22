<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\ActionInterface;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

abstract  class DeleteActionInterface extends BaseAbstractAction
{

    public function __construct($params = [])
    {
        parent::__construct($params);
    }

    public function getIcon(): int
    {
        return self::TYPE_DELETE;
    }

    public function getRouteHandler(): RouteHandler
    {
        // TODO: Implement getRouteHandler() method.
    }

    public function subActionRoute()
    {
        // TODO: Implement subActionRoute() method.
    }

    public function generateHtml()
    {
        // TODO: Implement generateHtml() method.
    }
}
