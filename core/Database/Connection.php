<?php

namespace Core\Database;

use Core\Database\Contracts\ConnectionContract;
use PDO;
use PDOException;

class Connection implements ConnectionContract
{

    public static function make(array $config): ?PDO
    {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options'],
            );
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
}