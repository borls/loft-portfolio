<?php
require_once('composer/phpmailer/phpmailer/class.phpmailer.php');

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

        if ($site['smtp_mode'] == 'enabled') {
            $this->Host = $site['smtp_host'];
            $this->Port = $site['smtp_port'];
            if ($site['smtp_username'] != '') {
                $this->SMTPAuth = true;
                $this->Username = $site['smtp_username'];
                $this->Password = $site['smtp_password'];
            }
            $this->Mailer = "smtp";
        }
        if (!$this->From) {
            $this->From = $site['from_email'];
        }
        if (!$this->FromName) {
            $this->FromName = $site['from_name'];
        }
        if (!$this->Sender) {
            $this->Sender = $site['from_email'];
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