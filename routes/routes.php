<?php

$router->get('login', "UsersController@showLogin");
$router->post('login', "UsersController@login");

$router->get('register', "UsersController@showRegister");
$router->post('register', "UsersController@register");

$router->get('logout', "UsersController@logout");

$router->get('home', "HomeController@index");
$router->get('search', "SearchController@index");

