<?php
session_start();
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

if (isset($_POST['email'])){
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
        exit ("Введите e-mail");
    }
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);
$user = new User();
try {
    $user->create($login, $password, $email);
    echo 1;
}catch (Exception $e) {
        echo $e->getMessage();
}
