<?php
$codeWord = "nd82jaake";
$isCorrect = false;
$message = "";


if (preg_match('/[(%&@\/*?,;:)]/', $_POST['login'])) {
    $message .= "Ошибка! Логин содержит недопустимые символы (%&@/*?,;:)<br />";
    $isCorrect = true;
} 
if (strlen($_POST['password']) < 8) {
    $message .= "Длина пароля должна быть минимум 8 символов<br />";
    $isCorrect = true;
} 
if (!preg_match('/[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.+[a-zA-Z.]{2,}+/', $_POST['email'])) {
    $message .= "Ошибка! Введите корректный email<br />";
    $isCorrect = true;
} 
if (strlen($_POST['firstName']) === 0 || strlen($_POST['lastName']) === 0 || strlen($_POST['middleName']) === 0) {
    $message .= "Ошибка! Введите имя<br />";
    $isCorrect = true;
} 
if ($_POST['code'] != $codeWord) {
    $message .= "Неверное кодовое слово<br />";
    $isCorrect = true;
} 
if ($isCorrect == false) {
    $message = 'Вы успешно зарегистрировались';
}

echo $message;
?>