<?php

namespace App\Repository\Contracts;

use stdClass;

interface UsersRepositoryContract
{
    public function findByEmail(string $email): ?stdClass;
    public function create(array $data): ?string;
    public function login(string $email, string $password): ?stdClass;
    public function search(string $searchTerm, int $skip, int $take): ?array;
}