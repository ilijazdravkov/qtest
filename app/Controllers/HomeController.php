<?php

namespace App\Controllers;

use App\Traits\Authenticatable;
use Core\Httpd\Redirect;
use Core\Session;

class HomeController
{
    use Authenticatable;

    public function __construct()
    {
        $this->middleware('authMiddleware', ['index']);
    }

    public function index()
    {
        return view('home/index');
    }
}