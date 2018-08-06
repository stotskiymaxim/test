<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.07.2018
 * Time: 11:31
 */
include "Task.php";
$id=abs((int)$_GET['del']);
if($id){
    $task = new Task();
    $task->deletetask($id);

    exit;
}else{
    $errMessage="хватит меня ломать!";
}