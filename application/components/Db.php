<?php


class Db
{
    public static function getConnection()
    {
        $config = require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

        // Устанавливаем соединение
        $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['database']}";
        $pdo = new PDO($dsn, $config['db']['ModelUser'], $config['db']['password']);
        $pdo->exec("set names utf8");

        return $pdo;
    }
}