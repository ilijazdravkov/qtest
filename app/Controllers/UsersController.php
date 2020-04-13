<?php

namespace App\Controllers;

use App\Business\Support\Validation\UserValidator;
use Core\Httpd\Request;

class UsersController
{
    public function __construct()
    {
    }

    public function showLogin(){
        return view('users/login');
    }

    public function showRegister(){
        return view('users/register');
    }

    public function register(){
        $data = Request::post();

        $validation = UserValidator::validateRegister($data);

        if(!$validation->fails()){

        }else{
            return view('users/register', ['errors' => $validation->errors()]);
        }
    }
}