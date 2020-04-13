<?php

namespace Core;

use Exception;

class Session
{
    public static function start(): void{
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, $value): void{
        $_SESSION[$key] = $value;
    }

    public static function get(string $key){
        if(!array_key_exists($key, $_SESSION)){
            return null;
        }

        return $_SESSION[$key];
    }

    public static function destroy(): void{
        $_SESSION = array();
        session_destroy();
    }
}