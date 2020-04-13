<?php

namespace Core\Database;

use Core\Database\Connection;
use PDO;
use PDOStatement;

class DB
{
    protected static PDO $connection;

    public static function setConnection(PDO $connection){
        static::$connection = $connection;
    }

    public static function __callStatic($name, $arguments)
    {
        if(!isset(static::$connection)){
            static::setConnection(Connection::make(require 'config/database.php'));
        }
    }

    public static function fetch(string $query, array $params): ?stdClass{
        $stmt = static::$connection->prepare($query);

        static::bindParams($stmt, $params);

        $stmt->execute();

        if($stmt -> rowCount() > 0){
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }else{
            return null;
        }
    }

    private static function bindParams(PDOStatement $stmt, array $params): ?PDOStatement{
        if(!isset($params)) return null;

        foreach($params as $key=>$value){
            $stmt->bindParam(':'.$key, $value);
        }

        return $stmt;
    }
}