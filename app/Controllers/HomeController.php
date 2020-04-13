<?php

namespace App\Controllers;

use Core\Httpd\Redirect;
use Core\Session;

class HomeController
{
    public function index()
    {
        echo 'Home Page';
    }
}