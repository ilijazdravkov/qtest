<?php

namespace App\Controllers;

class UsersController
{
    public function __construct()
    {
    }

    public function login(){
        return view('users/login');
    }

    public function register(){
        return view('users/register');
    }
}