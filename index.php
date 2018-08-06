<?php
session_start();

?>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="crud.js"></script>
<div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" id="login-form">
            <input id = "username" type="text" placeholder="username"/>
            <input id="pass" type="password" placeholder="password"/>
            <input type="submit" class="submit" id="login" value="Войти">
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
<a href="Tasks.php">На следующую страницу </a>