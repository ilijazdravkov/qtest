<?php

namespace Core\Httpd;

class Redirect
{
    public static function to(string $url){
        header("Location: {$url}");
        exit();
    }
}