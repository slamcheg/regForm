<?php


namespace Application\Interfaces;


interface CodeGeneratorInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @param $length
     * @return $this
     */
    public function generateCode($length);
}