<?php

session_start();

if (isset($_SESSION['login'])) header('Location: /User/result');
?>


<h1>Вход в систему</h1>

<a href="/User/registration">Регистрация</a>
<a href="/Task">К задачам</a>

<form action="/User/login" method="post">
    <p>
        <label for="login">Login</label>
        <input id="login" type="text" name="login">
    </p>

    <p>
        <label for="password">Password</label>
        <input id="password" type="text" name="password">
    </p>

    <button id="btnLogin" type="submit">send</button>
</form>