<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.07.2018
 * Time: 11:05
 */

interface Itask
{
    function savetask($header, $body, $status, $tim, $user);
    function updatetask($id, $header, $body, $status, $tim, $user);
    function deletetask($id);
    function showtask();
}