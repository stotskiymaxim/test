<?php
session_start();
require_once "User.php";
require "Task.php";

if(empty($_SESSION['user_id'])){
echo "Вам необходимо зарегистрироваться, чтобы видеть этот контент";

}
else{
echo "<a href='exit.php'>Выход</a>";

//Подключим файл с описанием класса mybook

//Создадим объект gbook
$task=new Task();
//Создадим переменную $errMessage со строковым значением ""
$errMessage="";
//проверим была ли отправлена HTML-форма
//Если ДА, то подключите файл с кодом для обработки HTML-формы
//if($_SERVER["REQUEST_METHOD"]=="POST"){
 //   include "savetask.php";
//}
//Проверяем был ли запрос методом GET на удаление записи
// Если ДА, то подключаем файл с кодом для удаления записи
//if(isset($_GET['del'])){
    //include "deletetask.php";
//}

?>
<!DOCTYPE html>

<html>
<head>
    <title>пример гостевой книги php</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="crud.js"></script>


</head>

<body>

    <div class="block-left" id="block-left">
<section id="content" class="container">
    <?php
    include "showtask.php";
    ?>
</section>
    </div>

    <div class="block-right">

    <h2>Создать задачу</h2>
    <?php
    //Проверим, не является ли переменная $errMessage пустой строкой
    //Если НЕТ, то выведите значение переменной $errMessage
    if($errMessage){
        echo "<p>".$errMessage;
    }
    ?>
    <form id="form1" name="form1" action="" method="post">
        <table>
            <tbody><tr><td><p>Заглавие</p></td><td><input type="text" id="header"></td>
            </tr><tr>
                <td><p>Описание</p></td>
                <td>
                    <textarea id="bod" cols="40" rows="4"></textarea></td>
            </tr>
            <tr><td>  <input type="button" class="" id="btn1" name="1" value="New">
                      <input type="button" class="" id="btn2" name="2" value="Active">
                      <input type="button" class="" id="btn3" name="3" value="Done">
                      </td> </tr>
            <tr><td>  <input type="button" id="c" value="Добавить"> <input type="button" id="s" value="Редактировать"></td></tr>
            </tr>
            </tbody></table>
    </form>
    </div>

</body>
</html>
<?php
}
?>