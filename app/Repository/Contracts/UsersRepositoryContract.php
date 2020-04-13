<?php

namespace App\Repository\Contracts;

use stdClass;

interface UsersRepositoryContract
{
    public function findByEmail(string $email): ?stdClass;
    public function create(array $data): ?string;
}