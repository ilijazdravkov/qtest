<?php

namespace Core\Database;

use Core\Database\Connection;
use PDO;
use PDOException;
use PDOStatement;
use stdClass;

class DB
{
    protected static PDO $connection;

    public static function setConnection(PDO $connection)
    {
        static::$connection = $connection;
    }

    public static function __callStatic($name, $arguments)
    {
        if(!isset(static::$connection)){
            static::setConnection(Connection::make(require 'config/database.php'));
        }
    }

    public static function fetch(string $query, array $params): ?stdClass
    {
        $stmt = static::execute($query, $params);

        if($stmt->rowCount() > 0){
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }else{
            return null;
        }
    }

    public static function insert(string $query, array $params): string
    {
        $stmt = static::execute($query, $params);

        if($stmt){
            return static::$connection->lastInsertId();
        }else{
            return null;
        }
    }

    public static function execute(string $query, array $params): ?PDOStatement
    {
        $stmt = static::$connection->prepare($query);

        $stmt = static::bindParams($stmt, $params);

        try {
            $stmt->execute();

            return $stmt;
        }catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    private static function bindParams(PDOStatement $stmt, array $params): ?PDOStatement
    {
        if(!isset($params)) return null;

        foreach($params as $key=>$value){
            $stmt->bindValue(':'.$key, $value);
        }

        return $stmt;
    }
}