<?php

namespace App\Controllers;

use App\Business\Support\Validation\UserValidator;
use App\Repository\UsersRepository;
use Core\Httpd\Redirect;
use Core\Httpd\Request;

class UsersController
{
    protected UsersRepository $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function showLogin(){
        return view('users/login');
    }

    public function showRegister(){
        return view('users/register');
    }

    public function login(){
        $data = Request::post();

        $validation = UserValidator::validateLogin($data);

        if(!$validation->fails()){
            $user = $this->repository->login($data['email'], $data['password']);

            if($user){
                Redirect::to('home');
            }else{
                return view('users/login', ['unSuccessLoginMsg' => "Email\Password combination doesn't match."]);
            }
        }else{
            return view('users/login', ['errors' => $validation->errors()]);
        }
    }

    public function register(){
        $data = Request::post();

        $validation = UserValidator::validateRegister($data);

        if(!$validation->fails()){

            $user = $this->repository->findByEmail($data['email']);

            if(!$user){
                $user = $this->repository->create($data);

                if($user){
                    Redirect::to('login');
                }else{
                    return view('users/register', ['error' => 'Some error has occurred, please try again.']);
                }
            }else{
                return view('users/register', ['emailExists' => 'Email already exists, try with another one.']);
            }
        }else{
            return view('users/register', ['errors' => $validation->errors()]);
        }
    }
}