<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/composer/phpmailer/phpmailer/class.phpmailer.php');

class FreakMailer extends PHPMailer
{
    var $priority = 3;
    var $to_name;
    var $to_email;
    var $From = null;
    var $FromName = null;
    var $Sender = null;

    function FreakMailer()
    {
        global $site;

        // Берем из файла config.php массив $site
        if ($site['smtp']['mode'] == 'enabled') {
            $this->Host = $site['smtp']['host'];
            $this->Port = $site['smtp']['port'];
            if ($site['smtp']['username'] != '') {
                $this->SMTPAuth = true;
                $this->Username = $site['smtp']['username'];
                $this->Password = $site['smtp']['password'];
            }
            $this->Mailer = "smtp";
        }
        if (!$this->From) {
            $this->From = $site['from']['email'];
        }
        if (!$this->FromName) {
            $this->FromName = $site['from']['name'];
        }
        if (!$this->Sender) {
            $this->Sender = $site['to']['email'];
        }
        $this->Priority = $this->priority;
    }
}

//// Читаем настройки config
//require_once('config.php');
//
//// Подключаем класс FreakMailer
//require_once('backend/freakmailer.inc');
//
//// инициализируем класс
//$mailer = new FreakMailer();
//
//// Устанавливаем тему письма
//$mailer->Subject = 'This is a test message';
//
//// Задаем тело письма
//$mailer->Body = 'This is test of my mailer';
//
//// Добавляем адрес в список получателей
//$mailer->AddAddress('bgin@inbox.ru', 'Boris Yuzhakov');
//
//if(!$mailer->Send())
//{
//    echo 'Не могу отослать письмо!';
//}
//else
//{
//    echo 'Письмо отослано!';
//}
//$mailer->ClearAddresses();
//$mailer->ClearAttachments();


// Массив для отправки на фронтенд
//$data = array();

//     Получаем данные из формы
//$data['name'] = trim($_POST['name']); //clear_data_str($_POST['name']);
//$data['email'] = trim($_POST['email']);
//$data['message'] = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES);
////     Получаем данные из формы
//$data['name'] = 'Yuzhakov Boris';
//$data['email'] = 'codebor@mail.ru';
//$data['message'] = 'This is test message from codebor.ru';
//$captcha_code = $_POST['captcha'];
//$sess_captcha = $_SESSION['randStrn'];

//// Если капча введена не верно
//if($sess_captcha != $captcha_code){
//    $data['status'] = 'NO';
//    $data['mes'] = "Код с картинки введен не верно";
//}
// Если капча введена верно
//else {
// Проверяем email
//if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
////    smtp_mail($data, $smtp_yandex);
//    send_message_to_email($data);
//
////    $mail->Host = $__smtp['host'];
////    $mail->SMTPAuth = $__smtp['auth'];
////    $mail->Username = $__smtp['username'];
////    $mail->Password = $__smtp['password'];
//////    $mail->SMTPSecure = 'ssl';
////    $mail->Port = $__smtp['port'];
////    $mail->CharSet = 'UTF-8';
////    $mail->From = $_mail['email'];
////    $mail->FromName = 'Yu Bo';
////    $mail->addAddress($data['email'], $data['name']);
//////    $mail->WordWrap = 80;
////    $mail->Subject = 'Сообщение с сайта портфолио';
////    $mail->Body = $data['message'];
////    if ($mail->send()) {
////        $data['status'] = 'OK';
////        $data['mes'] = "Письмо успешно отправлено";
////    } else {
////        $data['status'] = 'NO';
////        $data['mes'] = "Возникла неизвестная ошибка при отправке письма";
////    }
//} else {
//    $data['status'] = 'NO';
//    $data['mes'] = "Правильно заполните поле e-mail";
//}
//echo json_encode($data);
//exit;
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

//// если был сделан пост запрос
////if($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//
//// инициализируем класс
//$mailer = new FreakMailer();
//
//$data = array();
////
//// Получаем данные из формы
//$data['name'] = clear_data_str($_POST['name']);
//$data['email'] = clear_data_str($_POST['email']);
//$data['message']  = clear_data_str($_POST['message']);
////     Получаем данные из формы
////$data['name'] = 'Yuzhakov Boris';
////$data['email'] = 'codebor@mail.ru';
////$data['message'] = 'This is test message from codebor.ru';
//
//// Устанавливаем тему письма
//$mailer->Subject = 'Feedback message';
//
//// Задаем тело письма
//$mailer->Body = $data['message'];
//
//// FROM: Указываем отправителя письма
//$mail->setFrom($data['email'], $data['name']);
//
//// TO: Добавляем адрес в список получателей
//$mailer->AddAddress('codebor@mail.ru', 'Boris Yuzhakov');
//
//if (!$mailer->Send()) {
//    $data['result'] = 'Не могу отослать письмо!';
//} else {
//    $data['result'] = 'Письмо отослано!';
//}
//
////    $mail = new PHPMailer;
////    $mail->CharSet='UTF-8';
////    $mail->isSendmail();
////    $mail->IsHTML(true);
////    // Указываем отправителя письма
////    $mail->setFrom($data['email'], $data['name']);
////    // Указываем получателя письма
////    $mail->addAddress('bgin@inbox.ru', "Boris Yuzhakov");
////    // Указываем тему письма
////    $mail->Subject = "Отправка письма с сайта codebor.ru";
////    // Устанавливаем текст сообщения
////    $mail->msgHTML($data['message']);
////
////    $mail->send();
////    if(send_message_to_email($data)){
////        //unlink($file_upload);
////        redirect('Сообщение успешно отправлено', 'alert-success');
////    } else {
////        //unlink($file_upload);
////        redirect('Ошибка при отправке сообщения');
////    }
//$mailer->ClearAddresses();
//$mailer->ClearAttachments();
//echo json_encode($data);
//}
//
//
//exit;
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