<?php
session_start();
?>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="crud.js"></script>
<div class="login-page">
    <div class="form">
        <form class="login-form">
            <input id = "username" type="text" placeholder="login"/>
            <input id="pass" type="password" placeholder="password"/>
            <input type="button" class="submit" id="login" value="Войти">
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
        <form class="register-form">
            <input id = "username_r" type="text" placeholder="login"/>
            <input id="pass_r" type="password" placeholder="password"/>
            <input id="email" type="text" placeholder="e-mail address"/>
            <input type="submit" class="submit" id="reg" value="Зарегистрировать">
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>

    </div>
</div>