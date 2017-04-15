<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email as EmailOf;

class RestoreUserForm extends Form
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

        // Sign Up
        $restore = new Submit('restore');

        $this->add($restore);
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
