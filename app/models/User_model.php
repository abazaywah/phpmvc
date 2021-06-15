<?php

class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFullname($username)
    {
        $this->db->query("SELECT `fullname` FROM $this->table WHERE `username` = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function auth()
    {
        if (!empty($_POST)) {
            $username = strtolower($_POST['username']);
            $password = $_POST['password'];

            $this->db->query("SELECT `password` FROM $this->table WHERE LCASE(`username`) = :username");
            $this->db->bind('username', $username);
            $hash = $this->db->single();

            if (password_verify($password, $hash['password'])) {
                $_SESSION['username'] = $username;
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
