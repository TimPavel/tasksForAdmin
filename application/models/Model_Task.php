<?php


class Model_Task extends Model
{
    protected $tableName = 'tasks';

    public function get_data()
    {
        return $this->getTasks($this->tableName);
    }

    public function insertTask($name, $description)
    {
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare("INSERT INTO $this->tableName (name, description) VALUES (:name, :description)");
        $stmt->execute(array('name' => $name, 'description' => $description));
        return $pdo->lastInsertId();

    }

    public function getTasks()
    {
        $pdo = Db::getConnection();
        $sql = "SELECT * FROM $this->tableName ORDER BY id DESC";
        return $pdo->query($sql)->fetchAll();
    }

    public function updateTask($id, $status)
    {
        $pdo = Db::getConnection();
        $stmt = $pdo->prepare("UPDATE $this->tableName SET completed = :completed  WHERE id = :id");
        $stmt->execute(array(':completed' => $status, ':id' => $id));
    }



}