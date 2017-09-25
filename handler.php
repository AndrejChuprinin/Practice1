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


$uploaddir = 'Files/';
$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);


// Проверка файла на валидность и копирование его из каталога для временного хранения файлов

if ($_FILES['uploadfile']['size'] == 0) {
    exit;
} elseif
($_FILES['uploadfile']['size'] > 1024 * 5 * 1024) {
    echo "<br><font size=\"5\" color=\"red\">Файл не загружен - размер превышает 5 МБ</font>";
    exit;
} elseif (!($_FILES['uploadfile']['type'] == 'application/pdf')) {
    echo "<br><font size=\"5\" color=\"red\">Файл не загружен - нужен формат PDF</font>";
    exit;
} elseif (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
    echo "<h3>Файл успешно загружен: " . $_FILES['uploadfile']['name'] . "</h3>";
} else {
    echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
    exit;
}


