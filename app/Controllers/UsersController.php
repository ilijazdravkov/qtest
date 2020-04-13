<?php

namespace App\Controllers;

use Core\Httpd\Request;

class UsersController
{
    public function __construct()
    {
    }

    public function register(){
        var_dump(Request::method());
    }

    public function showLogin(){
        return view('users/login');
    }

    public function showRegister(){
        return view('users/register');
    }
}