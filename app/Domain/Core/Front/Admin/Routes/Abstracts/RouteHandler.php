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
}
