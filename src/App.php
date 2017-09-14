<?php

namespace Application;

use Application\Interfaces\RouterInterface;
use Application\Interfaces\ViewManagerInterface;

/**
 * Class App
 * @package Application
 *
 * @property RouterInterface $router
 * @property ViewManagerInterface $viewManager;
 */
class App
{
    private $router;
    private $viewManager;

    public function __construct($config)
    {
        $this->setViewManager(new $config['viewManager']['class']);
        $this->setRouter(new $config['router']['class']);
    }

    /**
     * Run application
     */
    public function run()
    {

        try {
            $this->getRouter()->run();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }


    /**
     * @return RouterInterface
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param mixed $router
     * @throws \Exception
     */
    public function setRouter($router)
    {
        if ($router instanceof RouterInterface)
            $this->router = $router;
        else
            throw new \Exception('Router class must be instance of' . RouterInterface::class);
    }

    /**
     * @param mixed $viewManager
     * @return App
     * @throws \Exception
     */
    public function setViewManager($viewManager)
    {
        if ($viewManager instanceof ViewManagerInterface)
            $this->viewManager = $viewManager;
        else
            throw new \Exception('Router class must be instance of' . ViewManagerInterface::class);
    }

    /**
     * @return ViewManagerInterface
     */
    public function getViewManager()
    {
        return $this->viewManager;
    }
}