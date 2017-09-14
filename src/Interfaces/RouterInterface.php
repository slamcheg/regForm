<?php


namespace Application\Interfaces;


interface RouterInterface
{
    /**
     * @return array
     */
    public function getRoutes();

    /**
     * @param array $routes
     * @return $this
     */
    public function setRoutes($routes);

    /**
     * Run router
     */
    public function run();
}