<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email as EmailOf;
use Phalcon\Validation\Validator\StringLength;

class LoginUserForm extends Form
{

    public function initialize()
    {
        // Email
        $email = new Email('email');

        $email->addValidators([
            new PresenceOf(array(
                'message' => 'E-mail должен быть указан'
            )),
            new EmailOf(array(
                'message' => 'E-mail введён не верно'
            ))
        ]);

        $this->add($email);

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
        $login = new Submit('login');

        $this->add($login);
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
