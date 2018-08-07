<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.07.2018
 * Time: 11:10
 */
include "Itask.php";

class Task implements Itask
{
    private $db;

    function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=test", "stomax", "040398");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names utf8");
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function __destruct()
    {
        $this->db=null;
    }

    function savetask($header, $body, $status, $tim,$user){
        $stmt = $this->db->prepare("INSERT INTO task (header,body,status,tim, users) VALUES (:header,:body, :status, :tim, :users)");
        $stmt -> execute(array('header'=>$header,
                'body'=>$body,
                'status'=>$status,
                'tim'=>$tim,
                'users'=>$user
            )
        );
    }
    function updatetask($id,$header, $body, $status, $tim, $users){
        $stmt = $this->db->prepare("UPDATE task SET header=:header, body=:body, status=:status, tim=:tim, users=:users where id=:id");
        $stmt -> execute(array('id'=>$id,
                'header'=>$header,
                'body'=>$body,
                'status'=>$status,
                'tim'=>$tim,
                'users'=>$users
            )
        );
    }
    function deletetask($id){
        $stmt = $this->db->prepare("DELETE from task where id=:id");
        $stmt -> execute(array('id'=>$id
            )
        );
    }
    function showtask(){
        $qry = "SELECT t.id, header, body, status, tim, s.username FROM task t JOIN users s ON t.users = s.id  ORDER BY tim DESC";
        $res = $this->db->query($qry)->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

}