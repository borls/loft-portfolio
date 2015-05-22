<?php
// Подключение к базе данных
$db_host = "127.0.0.1";
//$db_username = "u0072221_default";
//$db_pass = "!bdM7!Yq";
//$db_name = "u0072221_default";
//$db_connect = @mysql_connect ($db_host, $db_username, $db_pass);
//if (!$db_connect) {
//    echo ("Не могу подключиться к серверу базы данных!");
//}
//if(!@mysql_select_db($db_name)) {
//    $sql = 'CREATE DATABASE u0072221_default';
//    if (mysql_query($sql, $db_connect)) {
//        $db_connect;
//    }
//}
//mysql_query("SET NAMES 'utf8'");
//mysql_query("SET CHARACTER SET 'utf8'");

// Если не авторизован, то user.
class Authorization {
    // Проверка авторизации
    public function getUser() {
        if (!isset($_SESSION['user'])) return false;
        return $_SESSION['user'];
    }
    // Авторизация пользователя
    public function auth($login, $password) {
        $query = 'SELECT * FROM `Auth`';
        $res = mysql_query($query);
        // Если не удается подключится к таблицы с БД создаем новую таблицу и записуем стандартный логин и пароль
        if (!$res) {
            mysql_select_db('u0072221_default');
            $sql = "CREATE TABLE u0072221_default.Auth (id INT( 3 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`login` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,`psw` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL) ENGINE = MYISAM";
            if (mysql_query($sql)){
                // Добавляем логин и пароль в базу данных
                $qwrw = "INSERT INTO `u0072221_default`.`Auth` (`login`, `psw`) VALUES ('admin', md5('admin'))";
                mysql_query($qwrw);
                $res = mysql_query($query);
            }
        }
        while($row = mysql_fetch_array($res))
        {
            if ($login == $row['login'] && $password == $row['psw'])
            {
                $_SESSION['is_auth'] = true;
                $_SESSION['login'] = $login;
                return true;
            }
        }
        $_SESSION['is_auth'] = false;
        return false;
    }
    public function getLogin() {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }
    public function out() {
        $_SESSION = array();
        session_destroy();
    }
}

$auth = new Authorization();
if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out();
        header("Location: ?is_exit=0");
    }
}