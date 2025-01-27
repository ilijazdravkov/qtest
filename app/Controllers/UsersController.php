<?php

namespace App\Controllers;

use App\Support\Validation\UserValidator;
use App\Repository\UsersRepository;
use App\Traits\Authenticatable;
use Core\Httpd\Redirect;
use Core\Httpd\Request;
use Core\Session;

class UsersController
{
    use Authenticatable;

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
                Session::set('userLogged', true);
                Session::set('userName', $user->name);

                if(Session::get('redirectTo')){
                    Redirect::to(Session::get('redirectTo'));
                }else{
                    Redirect::to('home');
                }
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

    public function logout()
    {
        Session::destroy();

        Redirect::to('login');
    }
}