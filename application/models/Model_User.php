<?php

class Model_User extends Model
{
    protected $tableName = 'users';


    public function insertUser($username, $login, $password)
    {
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare("INSERT INTO $this->tableName (username, login, password) VALUES (:username, 
                                                            :login, :password)");
        $stmt->execute(array('username' => $username, 'login' => $login, 'password' => $password));

    }

    public function getUser($login)
    {
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM $this->tableName WHERE login = :login");
        $stmt->execute(array(':login' => $login));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}