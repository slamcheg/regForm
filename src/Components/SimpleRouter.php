<?php


namespace Application\Components;


use Application\Interfaces\RouterInterface;

class SimpleRouter implements RouterInterface
{
    private $routes;

    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param array $routes
     * @return $this
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
        return $this;
    }

    public function run()
    {
        $route = isset($_GET['r']) ? $_GET['r'] : '/';
        if (!empty($route) && !empty($this->routes[$route])) {
            call_user_func($this->routes[$route]);
        } else {
            throw new \Exception('Route not found', 404);
        }
    }
}