<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 04.08.2018
 * Time: 14:31
 */
include "Task.php";
$id=abs((int)$_POST['id']);
$header=$_POST['header'];
$body=$_POST['body'];
$status=$_POST['status'];
$user = (int)$_SESSION['user_id'];
if($id && $header && $body && $status){
    $task = new Task();
    $task->updatetask($id,$header,$body,$status,time(),$user);

    exit;
}else {
    $errMessage = "хватит меня ломать!";
}