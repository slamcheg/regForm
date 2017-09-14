<?php

namespace Application\View;
use Application\Interfaces\ViewManagerInterface;

/**
 * Class ViewManager
 * @package Application\View
 *
 * @property string $viewPath
 */
class ViewManager implements ViewManagerInterface
{
    private $viewPath;

    /**
     * @return mixed
     */
    public function getViewPath()
    {
        return $this->viewPath;
    }

    /**
     * @param mixed $viewPath
     */
    public function setViewPath($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    /**
     * Rendering php file
     * @param array $params
     * @throws \Exception
     */
    public function renderView($params = [])
    {
        try {
            extract($params, EXTR_OVERWRITE);
            require_once $this->viewPath;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}