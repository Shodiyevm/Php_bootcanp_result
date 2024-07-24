<?php

class TODO
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = DB::connect();
    }
    public function SETTODO(string $todoname)
    {
        $status = false;

        $stmt = $this->pdo->prepare('INSERT INTO tasks (text, status) VALUES(:text, :status)');

        $todoname = trim($todoname);
        $stmt->bindParam("text", $todoname);
        $stmt->bindParam("status", $status, PDO::PARAM_BOOL);
        return $stmt->execute();
    }
    public function GETTODO()
    {
        return $this->pdo->query("SELECT * FROM tasks")->fetchAll();
    }

    public function complete(int $id): bool
    {
        $status = true;
        $stmt   = $this->pdo->prepare("UPDATE tasks SET status=:status WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    public function uncompleted(int $id):bool
    {
        $status = false;
        $stmt   = $this->pdo->prepare("UPDATE tasks  SET status=:status WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    public function DELETTODO($ID)
    {
        $this->pdo->query("DELETE FROM tasks WHERE id = $ID");
        $this->GETTODO();
    }
}
