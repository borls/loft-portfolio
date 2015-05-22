<?php

session_start();

unset($_SESSION['user']);
session_destroy();
header("HTTP/1.1 307 Temporary Redirect");
header("Location: advance.php");
exit;