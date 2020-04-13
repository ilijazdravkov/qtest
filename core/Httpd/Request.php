<?php

namespace Core\Httpd;

class Request
{
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}