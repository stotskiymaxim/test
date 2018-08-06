<?php

require_once "User.php";

if (isset($_POST['login'])){
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
        exit ("Введите пожалуйста логин!");
    }
}
if (isset($_POST['password'])){
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
        exit ("Введите пароль");
    }
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);
$user = new User();
if(!$user->authorize($login,$password,true)){
    exit ("Извините, введённый вами логин или пароль неверный.");
}
else{
    echo 1;

    //echo $_SESSION['user_id'];
}


?>