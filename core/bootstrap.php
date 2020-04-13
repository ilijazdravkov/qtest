<?php

use Core\Httpd\Router;
use Core\Httpd\Request;
use Core\Database\Connection;
use Core\Database\DB;

DB::setConnection(Connection::make(require 'config/database.php')); // establish connection to db

$router = Router::load('routes/routes.php'); // load routes file

$router->direct(Request::uri(), Request::method()); // direct the request to the specified route
