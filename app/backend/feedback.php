<?php
// Открываем сессию
session_start();

require_once 'functions.php';
//$secretKey = "6Le49wYTAAAAAImaxLqm7o57sbHTqG1gAH9uFHaW";
//$publicKey = "6Le49wYTAAAAAOF2yXK91DOjY9RHcPLHwOYRtyjj";


//if(empty($login) || empty($password)){
//
//    $_SESSION['message'] = "Заполните все поля";
//    header("HTTP/1.1 302 Moved Temporarily");
//    header("Location: index.php");
//
//} else if (!check_captcha($secretKey, $captcha, $ip)){
//    $_SESSION['message'] = "Вы не верно заполнили капчу";
//    header("HTTP/1.1 302 Moved Temporarily");
//    header("Location: index.php");
//} else if ($login != $login_auth || $password != $pass_auth){
//    $_SESSION['message'] = "Пользователя с таими данными нет в базе";
//    header("HTTP/1.1 302 Moved Temporarily");
//    header("Location: index.php");
//} else {
//    $_SESSION['message'] = "Вы успешно залогинены";
//    $_SESSION['auth'] = true;
//    header("HTTP/1.1 302 Moved Temporarily");
//    header("Location: index.php");
//}

// если был сделан пост запрос
if($_SERVER['REQUEST_METHOD'] == 'POST') {
// Читаем настройки config
    require_once('backend/mailer/config.php');

// Подключаем класс FreakMailer
    require_once('backend/mailer/freakmailer.inc');

// инициализируем класс
    $mailer = new FreakMailer();

    // Получаем данные из формы
    $name = clear_data_str($_POST['name']);
    $email = clear_data_str($_POST['email']);
    $message  = clear_data_str($_POST['message']);

// Устанавливаем тему письма
    $mailer->Subject = 'This is a test message';

// Задаем тело письма
    $mailer->Body = $message;

// Добавляем адрес в список получателей
    $mailer->AddAddress($email, $name);

    if (!$mailer->Send()) {
        echo 'Не могу отослать письмо!';
    } else {
        echo 'Письмо отослано!';
    }
    $mailer->ClearAddresses();
    $mailer->ClearAttachments();
}
echo 'well done';
exit;
//// если был сделан пост запрос
////if($_SERVER['REQUEST_METHOD'] == "POST"){
////    header("Content-type: text/txt; charset=UTF-8");
//
//    // Получаем данные из формы
//    $name = clear_data_str($_POST['name']);
//    $email = clear_data_str($_POST['email']);
//    $message  = clear_data_str($_POST['message']);
////    $file = $_FILES['upload'];
////    $file_upload = null;
//
//    // если есть пустые поля
////    if(empty($name) || empty($email) || empty($message)){
////        return redirect("Заполните все поля", "alert-danger");
////    }
//
////    $captcha = $_POST['g-recaptcha-response'];
//
////    if (check_captcha($secretKey, $captcha, $ip)){
////        if(send_message_to_email(
////            array(
////                'name' => $name,
////                'email' => $email,
////                'message' => $message)
////        )) {
////            $response = array(
////                'status' => 'OK',
////                'msg' => 'Сообщение успешно отправлено'
////            );
////        } else {
////            $response = array(
////                'status' => 'FAIL',
////                'msg' => 'Ошибка при отправке сообщения'
////            );
////        }
////    } else {
////        $response = array(
////            'status' => 'FAIL',
////            'msg' => 'Вы не заполнили капчу'
////        );
////    }
//    echo json_encode($name, $email, $message);
////
////    // Если файл был прикреплен
////    if($file['size'] > 0){
////        $file_upload = download_files($file);
////    }
//
//    // Если файл был отправлен
//    if(send_message_to_email(array(
//        'name' => $name,
//        'email' => $email,
//        'message' => $message
//    ), $file_upload)){
//        unlink($file_upload);
//        redirect('Сообщение успешно отправлено', 'alert-success');
//    } else {
//        unlink($file_upload);
//        redirect('Ошибка при отправке сообщения');
//    }
////}