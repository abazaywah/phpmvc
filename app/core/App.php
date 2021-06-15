<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (!empty($url[0])) {
            $url_controller = ucfirst($url[0]);
            if (file_exists('../app/controllers/' . $url_controller . '.php')) {
                $this->controller = $url_controller;
                unset($url[0]); // dihilangkan untuk memudahkan
            }
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller; // diinstantiasi supaya bisa dipanggil methodnya

        // method
        if (!empty($url[1])) {
            $url_method = strtolower($url[1]);
            if (method_exists($this->controller, $url_method)) {
                $this->method = $url_method;
                unset($url[1]); // dihilangkan untuk memudahkan
            }
        }

        // params
        if (!empty($url)) { // jika tidak kosong berarti tinggal params
            $this->params = array_values($url);
        }

        // run everything
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim(trim($_GET['url']), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
