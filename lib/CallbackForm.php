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
        if (empty($this->name) || strlen($this->name) > 30 || strlen($this->name) < 2) {
            return false;
        }
        if (empty($this->phone) || strlen($this->phone) < 7 || strlen($this->phone) > 15) {
            return false;
        }
        if (empty($this->email)) {
            return true;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "Вы ввели некорректный адрес электронной почты<br>";
            return false;

        }
        return true;
    }

    public function send()
    {
        if (!empty($this->email)) {
            echo "<h3>Форма успешно отправлена!</h3>";
            echo '<br>';
            echo 'Name: ' . $this->name;
            echo '<br>';
            echo 'Phone: ' . $this->phone;
            echo '<br>';
            echo 'Email: ' . $this->email;
            echo '<br>';
        }
        else{
            echo "<h3>Форма успешно отправлена!</h3>";
            echo '<br>';
            echo 'Name: ' . $this->name;
            echo '<br>';
            echo 'Phone: ' . $this->phone;
            echo '<br>';
        }
    }
}