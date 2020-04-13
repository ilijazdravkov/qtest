<?php

namespace Core;

use Exception;

class App
{
    private static $registry = [];

    public static function register($key, $value){
        self::$registry[$key] = $value;
    }

    public static function get($key){
        if(!array_key_exists($key, self::$registry)){
            throw new Exception("Key {$key} doesn't exists.");
        }

        return self::$registry[$key];
    }
}