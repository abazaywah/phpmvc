<?php

class Task extends Controller
{
    public function index()
    {
        $data = $this->model('Task_model')->getAllTask();
        $this->view('templates/html');
        $this->view('templates/header', 'Task List');
        $this->view('templates/body');
        $this->view(strtolower(get_class($this)) . '/index', null, $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $dataID = $this->model('Task_model')->addTask($_POST);
        if ($dataID > 0) {
            $data = $this->model('Task_model')->getTaskById($dataID);
            Flasher::setFlash('success', 'task ' . $data['task_name'], 'berhasil', 'ditambahkan');
        } else {
            Flasher::setFlash('danger', 'task baru', 'gagal', 'ditambahkan');
        }
        header('Location: ' . BASEURL . '/task');
        exit;
    }

    public function retrieve($id)
    {
        $data = $this->model('Task_model')->getTaskById($id);
        $this->view('templates/html');
        $this->view('templates/header', 'Detail');
        $this->view('templates/body');
        $this->view(strtolower(get_class($this)) . '/detail', null, $data);
        $this->view('templates/footer');
    }

    public function retrieveUpdate() // ajax
    {
        $data = $this->model('Task_model')->getTaskById($_POST['id']);
        echo json_encode($data);
    }

    public function update()
    {
        $data = $this->model('Task_model')->getTaskById($_POST['id']);
        if ($this->model('Task_model')->editTask($_POST) > 0) {
            Flasher::setFlash('success', 'task ' . $data['task_name'], 'berhasil', 'diubah');
            header('Location: ' . BASEURL . '/task');
        } else {
            Flasher::setFlash('danger', 'task ' . $data['task_name'], 'gagal', 'diubah');
            header('Location: ' . BASEURL . '/task');
        }
        exit;
    }

    public function delete($id)
    {
        $data = $this->model('Task_model')->getTaskById($id);
        if ($this->model('Task_model')->deleteTask($id) > 0) {
            Flasher::setFlash('success', 'task ' . $data['task_name'], 'berhasil', 'dihapus');
            header('Location: ' . BASEURL . '/task');
        } else {
            Flasher::setFlash('danger', 'task ' . $data['task_name'], 'gagal', 'dihapus');
            header('Location: ' . BASEURL . '/task/detail/' . $id);
        }
        exit;
    }

    public function search()
    {
        $data = $this->model('Task_model')->getTaskByName();
        $this->view('templates/html');
        $this->view('templates/header', 'Task List');
        $this->view('templates/body');
        $this->view(strtolower(get_class($this)) . '/index', null, $data);
        $this->view('templates/footer');
    }
}
