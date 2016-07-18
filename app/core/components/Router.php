<?php

namespace ShopApp\Components;

/**
 * Class Router
 * @package ShopApp\Components
 */
class Router
{
    private $routes;

    /**
     * Router constructor.
     * @param $routes
     */
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

}