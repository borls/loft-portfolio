<?php
// Настройки для моего сайта
$captcha_secretKey = "6Le49wYTAAAAAImaxLqm7o57sbHTqG1gAH9uFHaW";
$captcha_publicKey = "6Le49wYTAAAAAOF2yXK91DOjY9RHcPLHwOYRtyjj";


// Настройки Email
$site['from'] = array(
    'name' => 'Yuzhakov Boris', // from (от) имя
    'email' => 'codebor@mail.ru', // from (от) email адрес
);

$site['to'] = array(
    'name' => 'Boris Yuzhakov', // to (кому) имя
    'email' => 'bgin@inbox.ru', // to (кому) email адрес
);

// На всякий случай указываем настройки
// для дополнительного (внешнего) SMTP сервера.
$site['smtp'] = array(
    'mode' => 'disabled',// enabled or disabled (включен или выключен)
    'host' => 'smtp.yandex.ru',
    'port' => 25,
    'username' => 'bgin@yandex.ru',
    'password' => '********'
);

//
//$_mail = array(
//    "username" => 'Yuzhakov Boris',
//    "password" => 'yandex79e',
//    "email" => 'bgin@yandex.ru'
//);
//
//$smtp_yandex = array(
//    "set" => "UTF-8", //smtp сервер
//    "host" => "smtp.yandex.ru", //smtp сервер
//    "debug" => 2,                   //отображение информации дебаггера (0 - нет вообще)
//    "auth" => true,                 //сервер требует авторизации
//    "secure" => "ssl",                 //сервер требует авторизации
//    "port" => 25,                    //порт (по-умолчанию - 25)
//    "username" => "bgin@yandex.ru",//имя пользователя на сервере
//    "password" => "********",//пароль
//    "addreply" => "bgin@yandex.ru",//ваш е-mail
//    "replyto" => "bgin@inbox.ru"      //e-mail ответа
//);
//$smtp_google = array(
//    "set" => "UTF-8", //smtp сервер
//    "host" => "smtp.gmail.com", //smtp сервер
//    "debug" => 2,                   //отображение информации дебаггера (0 - нет вообще)
//    "auth" => true,                 //сервер требует авторизации
//    "secure" => "ssl",                 //сервер требует авторизации
//    "port" => 465,                    //порт (по-умолчанию - 25)
//    "username" => "boris.yuzhakov@gmail.com",//имя пользователя на сервере
//    "password" => "********",//пароль
//    "addreply" => "bgin@yandex.ru",//ваш е-mail
//    "replyto" => "bgin@inbox.ru"      //e-mail ответа
//);