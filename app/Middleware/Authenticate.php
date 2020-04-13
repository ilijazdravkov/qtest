<?php

namespace App\Middleware;

use Core\Httpd\Redirect;
use Core\Httpd\Request;
use Core\Session;

class Authenticate
{

    public function handle(){
        if(!Session::get('userLogged')){
            Session::set('redirectTo', Request::route());

            Redirect::to('login');
        }
    }
}