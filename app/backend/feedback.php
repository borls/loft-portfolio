<?php

require_once('functions.php');

// Читаем настройки config
require_once('config.php');

// Подключаем класс FreakMailer
require_once('mailer/freakmailer.php');

// если был сделан пост запрос
//if($_SERVER['REQUEST_METHOD'] == 'POST') {


    // инициализируем класс
    $mailer = new FreakMailer();

    $data = array();
    // Получаем данные из формы
    $data['name'] = clear_data_str($_POST['name']);
    $data['email'] = clear_data_str($_POST['email']);
    $data['message'] = clear_data_str($_POST['message']);
    //     Получаем данные из формы
//    $data['name'] = 'Yuzhakov Boris';
//    $data['email'] = 'codebor@mail.ru';
//    $data['message'] = 'This is test message from codebor.ru';

    // если есть пустые поля
    if ($data['name'] || $data['email'] || $data['message']) {

        $data['captcha'] = $_POST['g-recaptcha-response'];

        if (true) {//check_captcha2($captcha_secretKey, $data['captcha'])

            // Отправляем письмо

            // Устанавливаем тему письма
            $mailer->Subject = 'Feedback message';

            // Задаем тело письма
            $mailer->Body = $data['message'];

            // FROM: Указываем отправителя письма
            $mailer->setFrom($data['email'], $data['name']);

            // TO: Добавляем адрес в список получателей
            $mailer->AddAddress('codebor@mail.ru', 'Boris Yuzhakov');

            if (!$mailer->Send()) {
                $data['result'] = 'Не могу отослать письмо!';
            } else {
                $data['result'] = 'Письмо отослано!';
            }

            $mailer->ClearAddresses();
            $mailer->ClearAttachments();
        } else {
            $data['result'] = 'Не заполнена капча';
        }
    } else {
        $data['result'] = 'Не заполнены все поля';
    }
    echo json_encode($data);

//}
//
//
//exit;