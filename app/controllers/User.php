<?php

class User extends Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            header('Location: ' . BASEURL . '/home');
        } else {
            header('Location: ' . BASEURL . '/user/login');
        }
        exit;
    }

    public function login()
    {
        if (isset($_SESSION['username'])) {
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            $this->view('templates/html');
            $this->view('templates/header', 'Login');
            $this->view('templates/login/header');
            $this->view(strtolower(get_class($this)) . '/login');
            $this->view('templates/body');
            $this->view('templates/footer');
        }
    }

    public function auth()
    {
        if ($this->model('User_model')->auth() == true) {
            header('Location: ' . BASEURL . '/home');
        } else {
            Flasher::setFlash('danger', 'Login', 'gagal.', 'Pastikan Username dan Password telah sesuai');
            header('Location: ' . BASEURL . '/user/login');
        }
        exit;
    }

    public function logout()
    {
        if (isset($_SESSION['username'])) unset($_SESSION['username']);
        header('Location: ' . BASEURL . '/user/login');
        exit;
    }
}
