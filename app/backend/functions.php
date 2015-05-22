<?php
require_once 'composer/autoload.php';
require_once 'composer/phpmailer/phpmailer/language/phpmailer.lang-ru.php';

function captchaCheck($key, $captcha, $ip) {
    $url_to_send = "https://www.google.com/recaptcha/api/siteverify?secret=".$key.'&response='.$captcha.'&ip='.$ip;
    $data_request = file_get_contents($url_to_send);
    $data = json_decode($data_request, true);

    if(isset($data['success']) && $data['success'] == 1){
        return true;
    } else {
        return false;
    }
}
function check_captcha($key, $catpcha, $ip){

    $url_to_send = "https://www.google.com/recaptcha/api/siteverify?secret=".$key.'&response='.$catpcha.'&ip='.$ip;
    $data_request = file_get_contents($url_to_send);
    $data =  json_decode($data_request, true);

    return isset($data['success']) && $data['success'] == 1;

}
/**
 *  Функция загрузки файлов
 *
 * @param $file
 * @param $url
 * @return string
 */
function download_files($file){

    $dir = __DIR__.'/uploads/';
    $filename  = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename_upload = $dir.$filename.'.'.$extension;

    if(move_uploaded_file($file['tmp_name'], $filename_upload)){
        return $filename_upload;
    }

}

/**
 * @param $data
 * @param null $file
 * @return bool
 * @throws Exception
 * @throws phpmailerException
 */
function send_message_to_email($data, $file = null){

    $mail = new PHPMailer;
    $mail->CharSet='UTF-8';
    $mail->isSendmail();
    $mail->IsHTML(true);
    // Указываем отправителя письма
    $mail->setFrom($data['email'], $data['name']);
    // Указываем получателя письма
    $mail->addAddress('bgin@inbox.ru', "Boris Yuzhakov");
    // Указываем тему письма
    $mail->Subject = "Отправка письма с сайта codebor.ru";
    // Устанавливаем текст сообщения
    $mail->msgHTML($data['message']);

    if($file){
        $mail->addAttachment($file);
    }

    return $mail->send();
}

function redirect($message, $class = "alert-info"){
//    $_SESSION['message'] = $message;
//    $_SESSION['message_class'] = $class;
//    header("HTTP/1.1 307 Temporary Redirect");
//    header("Location: index.php");
    exit;
}

function clear_data_str($data){
    return htmlentities(strip_tags(trim($data)));
}