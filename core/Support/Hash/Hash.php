<?php

namespace Core\Support\Hash;

class Hash
{
    public static function make(string $string)
    {
        return password_hash($string, PASSWORD_BCRYPT);
    }

    public static function verify(string $string, string $hash)
    {
        return password_verify($string, $hash);
    }
}