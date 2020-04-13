<?php

namespace Core\Httpd;

class Request
{
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function post(){
        return $_POST;
    }

    public static function get(){
        return $_GET;
    }

    public static function route(){
        return trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH), '/');
    }

    public static function uri(){
        return $_SERVER['REQUEST_URI'];
    }
}