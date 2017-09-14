<?php


namespace Application\Interfaces;


interface ViewManagerInterface
{
    public function getViewPath();

    public function setViewPath($viewPath);

    public function renderView($params = []);
}