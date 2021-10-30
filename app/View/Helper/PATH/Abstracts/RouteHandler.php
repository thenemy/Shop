<?php


namespace App\View\Helper\PATH\Abstracts;


abstract  class RouteHandler
{
    abstract protected function getName(): string;

    public function getRoute(string $route): string
    {
        $exploded = explode(".", $route);
        $exploded[1] = $this->getName();
        return implode(".", $exploded);
    }
}
