<?php


namespace Application\Components;


use Application\Interfaces\CodeGeneratorInterface;

/**
 * Class SmsCodeGenerator
 * @package Application\Components
 *
 * @property string $code
 */
class SmsCodeGenerator implements CodeGeneratorInterface
{
    private $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $length
     * @return $this
     */
    public function generateCode($length = 5)
    {
        $this->code = substr(md5(uniqid(rand(), true)), 0, 5);
        return $this;
    }
}