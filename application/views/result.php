<?php
session_start();
?>

<h1>Hello <?= $_SESSION['login'] ?></h1>

<a href="/User/logout">Выйти</a>
<a href="/Task">К задачам</a>

