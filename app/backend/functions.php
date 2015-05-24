<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/composer/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/composer/phpmailer/phpmailer/language/phpmailer.lang-ru.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/composer/phpmailer/phpmailer/class.phpmailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/composer/phpmailer/phpmailer/class.smtp.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/backend/mailer/config.php';


function check_captcha($key, $catpcha, $ip){

    $url_to_send = "https://www.google.com/recaptcha/api/siteverify?secret=".$key.'&response='.$catpcha.'&ip='.$ip;
    $data_request = file_get_contents($url_to_send);
    $data =  json_decode($data_request, true);

    return isset($data['success']) && $data['success'] == 1;

}
function check_captcha2($key, $catpcha){

    $url_to_send = "https://www.google.com/recaptcha/api/siteverify?secret=".$key.'&response='.$catpcha;
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

function smtp_mail($data, $__smtp){
    $mail = new PHPMailer();
    $mail->isSMTP();
    try {
        $mail->Host       = $__smtp['host'];
        $mail->SMTPDebug  = $__smtp['debug'];
        $mail->SMTPAuth   = $__smtp['auth'];
        $mail->Port       = $__smtp['port'];
        $mail->Username   = $__smtp['username'];
        $mail->Password   = $__smtp['password'];
        $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
        $mail->AddAddress($data['email']);                //кому письмо
        $mail->SetFrom($__smtp['addreply'], $__smtp['username']); //от кого (желательно указывать свой реальный e-mail на используемом SMTP сервере
        $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
        $mail->Subject = htmlspecialchars('Message from codebor.ru');
        $mail->MsgHTML($data['message']);
        //if($attach)  $mail->AddAttachment($attach);
        $mail->Send();
        echo "<br><p>Message sent Ok!</p>\n";
        return true;
    } catch (phpmailerException $e) {
        echo $e->errorMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return false;
}
function redirect($message, $class = "alert-info"){
//    $_SESSION['message'] = $message;
//    $_SESSION['message_class'] = $class;
//    header("HTTP/1.1 307 Temporary Redirect");
//    header("Location: /index");
    exit;
}

function clear_data_str($data){
    return htmlentities(strip_tags(trim($data)));
}