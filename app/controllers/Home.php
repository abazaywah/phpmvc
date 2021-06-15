<?php

class Home extends Controller {
    public function index() {
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $data = $this->model('User_model')->getFullname($username);
            $this->view('templates/header', 'Home');
            $this->view(strtolower(get_class($this)).'/index', '', $data);
            $this->view('templates/footer');
        } else {
            header('Location: '. BASEURL.'/user/login');
            exit;
        }
    }
}