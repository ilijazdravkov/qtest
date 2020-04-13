<?php

namespace Core\Database\Contracts;

use PDO;

interface ConnectionContract
{
    public static function make(array $config): ?PDO;
}