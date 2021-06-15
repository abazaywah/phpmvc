<?php

class Home extends Controller {
    public function index() {
        $this->_auth();
        $username = $_SESSION['username'];
        $data = $this->model('User_model')->getFullname($username);
        $this->view('templates/header', 'Home');
        $this->view(strtolower(get_class($this)).'/index', '', $data);
        $this->view('templates/footer');
    }
}