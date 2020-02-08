<?php

namespace application\core;

class Router {
    
    protected $routes = [];
    protected $params = [];

    function __construct() {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
        // debug($_SERVER);
    }


    public function add($route, $params) {
        $route = '#'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, trim($url, '/'), $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {
            $controller = 'application\controllers\\'.$this->params['controller'].'Controller.php';
            echo $controller;
        } else {
            echo '404';
        }
    }

}

?>