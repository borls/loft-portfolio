<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = clear_data_str($_POST['name']);
    $last_name = clear_data_str($_POST['lastname']);
    $message  = clear_data_str($_POST['message']);

    // Получаем доступ к файлу
    $file = $_FILES['project-image'];
    $file_upload = null;

    if($file['size'] == 0 || $file['size'] > 2097152){
        $_SESSION['message'] = "Файл не выбран или превышает 2МБ";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: index.php");
    }

    $file_name = $file['name'];
    $file_dist = __DIR__.'/../images/projects/'.$file_name;

    // если есть пустые поля
    if(empty($name) || empty($last_name) || empty($message)){
        redirect("Заполните все поля", "alert-danger");
    }

    if(move_uploaded_file($file['tmp_name'], $file_dist)){
        $_SESSION['message'] = "Файл успешно загружен на сервер<br /><a href='/images/projects/{$file_name}'>{$file_name}</a>";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Возникла ошибка при загрузке файла на сервер";
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: index.php");
    }


} else {
    $_SESSION['message'] = "У вас нет доступа на данную страницу";
    header("HTTP/1.1 302 Moved Temporarily");
    header("Location: index.php");
    exit;
}