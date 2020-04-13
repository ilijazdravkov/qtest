<?php

use Core\Httpd\Router;
use Core\Httpd\Request;
use Core\Database\Connection;
use Core\Database\DB;
use Core\Session;
use Core\App;
use App\Middleware\Authenticate;

DB::setConnection(Connection::make(require 'config/database.php')); // establish connection to db

Session::start();

App::register('authMiddleware', new Authenticate());

$router = Router::load('routes/routes.php'); // load routes file

$router->direct(Request::route(), Request::method()); // direct the request to the specified route

    function view($view, $data = []){
        $viewFileExt = '.view.php';
        $view .= $viewFileExt;
        extract($data);

        return require "app/views/master{$viewFileExt}";
    }


