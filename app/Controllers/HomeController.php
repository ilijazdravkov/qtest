<?php

namespace App\Controllers;

use Core\Httpd\Redirect;
use Core\Session;

class HomeController
{
    public function index()
    {
        if(!Session::get('userLogged')){
            Session::set('redirectTo', 'home');

            Redirect::to('login');
        }

        echo 'Home Page';
    }
}