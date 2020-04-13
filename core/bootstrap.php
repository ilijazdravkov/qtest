<?php

use Core\Httpd\Router;
use Core\Httpd\Request;

$router = Router::load('routes/routes.php'); // load routes file

$router->direct(Request::uri(), Request::method()); // direct the request to the specified route
