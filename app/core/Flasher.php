<?php

class Flasher
{
    public static function setFlash($type = 'success', $data = 'data', $message = 'berhasil', $action = 'ditambahkan')
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'data' => $data,
            'message' => $message,
            'action' => $action
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert"><strong>' . ucfirst($_SESSION['flash']['data']) . '</strong> ' . $_SESSION['flash']['message'] . ' ' . $_SESSION['flash']['action'] . '.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            unset($_SESSION['flash']);
        }
    }
}
