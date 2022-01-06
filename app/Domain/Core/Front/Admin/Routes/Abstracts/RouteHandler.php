<?php


namespace App\Domain\Core\Front\Admin\Routes\Abstracts;


use App\Domain\Core\Front\Admin\Routes\Traits\Routing;

abstract class RouteHandler
{

    abstract protected function getName(): string;

    public function getRoute(string $route): string
    {

        $exploded = explode(".", $route);

        $exploded[1] = $this->getName();
        return implode(".", $exploded);
    }

    static function new()
    {
        $class =get_called_class();
        return new $class();
    }
}
