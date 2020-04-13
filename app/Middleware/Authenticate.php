<?php

namespace App\Middleware;

use Core\Httpd\Redirect;
use Core\Session;

class Authenticate
{

    public function handle(){
        if(!Session::get('userLogged')){
            Session::set('redirectTo', 'home');

            Redirect::to('login');
        }
    }
}