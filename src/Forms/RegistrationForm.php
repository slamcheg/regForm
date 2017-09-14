<?php


namespace Application\Forms;

/**
 * Class RegistrationForm
 * @package Application\Forms
 *
 * @property string $phone
 * @property string $fullName
 * @property string $email;
 * @property string $password
 *
 */
class RegistrationForm
{
    public $phone;

    public $fullName;

    public $email;

    public $password;

    private $errors;

    private function requiredFields(){
        return ['phone','fullName','email','password'];
    }

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function load($data)
    {
        foreach ($this->requiredFields() as $field){
            if(isset($data[$field]) && !empty($data[$field]))
                $this->{$field} = $data[$field];
            else
                $this->errors[] = 'Field \''.$field .'\' is required';

        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}