<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\ActionInterface;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

abstract class AcceptActionAbstract extends BaseAbstractAction
{
    public function __construct($params = [])
    {
        parent::__construct($params);
    }

    public function getIcon(): int
    {
        return self::TYPE_ACTION;
    }

    public function subActionRoute(): string
    {
        return self::ACCEPT;
    }

    public function generateHtml()
    {
//        $accept_action = new AcceptComponent($this->event);
//        return $accept_action->render()->with($accept_action->data);
    }
}
