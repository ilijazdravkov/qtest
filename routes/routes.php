<?php

$router->get('login', "UsersController@showLogin");
$router->post('login', "UsersController@login");

$router->get('register', "UsersController@showRegister");
$router->post('register', "UsersController@register");

$router->get('home', "HomeController@index");

