<?php

namespace App\Controllers;

use App\Business\Support\Search;
use App\Business\Support\Validation\SearchValidator;
use App\Business\Support\Validation\UserValidator;
use App\Repository\UsersRepository;
use Core\Httpd\Redirect;
use Core\Httpd\Request;
use Core\Session;

class SearchController
{
    protected UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        if(!Session::get('userLogged')){
            Session::set('redirectTo', 'home');

            Redirect::to('login');
        }

        $data = Request::get();

        $validation = SearchValidator::validate($data);

        if(!$validation->fails()){
            $searchTerm = $data['search'];

            $take = Search::getResultsPerPage($data['show']);
            $skip = Search::skip($data['page'], $take);

            $users = $this->usersRepository->search($searchTerm, $skip, $take);

            if($users){
                return view('search/index', ['users' => $users]);
            }else{
                return view('search/index', ['error' => "Some error has occurred, please try again."]);
            }
        }else{
            return view('search/index', ['errors' => $validation->errors()->all()]);
        }
    }

}