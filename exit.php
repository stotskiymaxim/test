<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.08.2018
 * Time: 13:24
 */
require_once "User.php";
$user = new User();
$user->logout();
header("Location: index.php");