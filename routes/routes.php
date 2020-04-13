<?php

$router->get('login', "UsersController@showLogin");
$router->get('register', "UsersController@showRegister");
$router->post('register', "UsersController@register");