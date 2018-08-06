<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.07.2018
 * Time: 9:47
 */
include "Task.php";
$task=new Task();
function clearDate($date){
    $date=stripslashes($date);
    $date=strip_tags($date);
    $date=trim($date);
    return $date;
}
//Проверим, была ли корректным образом отправлена HTML-форма
//Если НЕТ, то присвоим переменной $errMessage строковое значение
//"Заполните все поля формы!"
//для начала прогоним получ. данные через clearDate
$header=clearDate($_POST['header']);
$body=clearDate($_POST['body']);
$status=clearDate($_POST['status']);
$user = (int)$_SESSION['user_id'];
//$status=$_POST['status'];

if(!empty($header) && !empty($body) ){
    //вызовем метод saveletter
    $task->savetask($header,$body,$status,time(),$user);
        // Перезапрашиваем страницу, чтобы избавиться от информации,
        //переданной через форму
        //header('Location: Tasks.php');

}else{
    echo "Заполните все поля формы!";
}