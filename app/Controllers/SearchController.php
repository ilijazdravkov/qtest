<?php

namespace App\Controllers;

use App\Support\Search;
use App\Support\Validation\SearchValidator;
use App\Repository\UsersRepository;
use App\Traits\Authenticatable;
use Core\Httpd\Request;

class SearchController
{
    use Authenticatable;

    protected UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;

        $this->middleware('authMiddleware', ['index']);
    }

    public function index()
    {
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