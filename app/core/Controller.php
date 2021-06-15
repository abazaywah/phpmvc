<?php

class Controller
{
    public function view($view = 'home/index', $title = '', $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model(); // karena model adalah kelas maka harus diinstantiasi
    }

    public function _auth()
    {
        if(!isset($_SESSION['username'])) {
            header('Location: '. BASEURL.'/user/login');
            exit;
        }
    }
}
