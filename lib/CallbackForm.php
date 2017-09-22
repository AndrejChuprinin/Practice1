<?php

/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:30
 */

require_once('FormAbstract.php');


class CallbackForm extends FormAbstract
{
    public $name;
    public $phone;
    public $email;

    public function __construct(string $name, string $phone, string $email)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function validate(): bool
    {
        if (empty($this->name) || strlen($this->name) > 20 || strlen($this->name) < 2) {
            return false;
        }
        if (empty($this->phone) || strlen($this->phone) < 7 || strlen($this->phone) > 15) {
            return false;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function send()
    {
        echo 'Форма успешно отправлена!';
        echo '<br>';
        echo 'Name: ' . $this->name;
        echo '<br>';
        echo 'Phone: ' . $this->phone;
        echo '<br>';
        echo 'E-mail: ' . $this->email;
    }
}