<?php

class Task_model
{
    private $table = 'task';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTask()
    {
        $this->db->query("SELECT `id`, `task_name` FROM $this->table");
        return $this->db->resultSet();
    }

    public function getTaskById($id)
    {
        $this->db->query("SELECT `id`, `task_name` FROM $this->table WHERE `id` = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addTask($task)
    {
        $query = "INSERT INTO $this->table VALUES ('', :task_name)";
        $this->db->query($query);
        $this->db->bind('task_name', $task['task']);
        $this->db->execute();
        return $this->db->lastID();
    }

    public function deleteTask($id)
    {
        $query = "DELETE FROM $this->table WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editTask($task)
    {
        $query = "UPDATE $this->table SET `task_name` = :task_name WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind('task_name', $task['task']);
        $this->db->bind('id', $task['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTaskByName()
    {
        $keyword = $_POST['keyword-task'];
        $query = "SELECT `id`, `task_name` FROM $this->table WHERE `task_name` LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
