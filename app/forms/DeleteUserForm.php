<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class DeleteUserForm extends Form
{

    public function initialize()
    {

        // Password
        $password = new Password('password');

        $password->addValidators([
            new PresenceOf(array(
                'message' => 'Пароль должен быть указан'
            )),
            new StringLength(array(
                'min' => 6,
                'messageMinimum' => 'Пароль должен быть длиннее 6 символов'
            )),
        ]);

        $this->add($password);

        // Sign Up
        $delete = new Submit('delete');

        $this->add($delete);
    }

    public function getMessage()
    {
        $return = '';
        foreach ($this->getMessages() as $message) {
            $return .= $message . "<br>";
        }
        return $return;
    }
}
