<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.05.17
 * Time: 19:40
 */
require_once('lib/CallbackForm.php');
require_once('lib/Helper.php');


//$name = isset($_POST['name']) ? trim($_POST['name']) : '';
//$phone = isset($_POST['num']) ? trim($_POST['num']) : '';
//$email = isset($_POST['mail']) ? trim($_POST['mail']) : '';
//$formType = isset($_POST['formType']) ? trim($_POST['formType']) : '';

$name = Helper::getPostParam('name');
$phone = Helper::getPostParam('phone');
$email = Helper::getPostParam('email');
$formType = Helper::getPostParam('formType');


$form = new CallbackForm($name, $phone, $email);

if ($form->validate()) {
    $form->send();
} else {
    echo 'Введите корректные данные';
}

