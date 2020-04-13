<?php

namespace App\Repository;

use App\Repository\Contracts\UsersRepositoryContract;
use Core\Database\DB;
use Core\Support\Hash\Hash;
use stdClass;

class UsersRepository implements UsersRepositoryContract
{

    public function findByEmail(string $email): ?stdClass
    {
        $query = 'SELECT * FROM users WHERE email = :email';

        return DB::fetch($query, ['email' => $email]);
    }

    public function create(array $data): ?string
    {
        $query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

        $params['name'] = $data['name'];
        $params['email'] = $data['email'];
        $params['password'] = Hash::make($data['password']);

        return DB::insert($query, $params);
    }

    public function login(string $email, string $password): ?stdClass{
        $user = static::findByEmail($email);

        if($user){
            if(Hash::verify($password, $user->password)){
                return $user;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function search(string $searchTerm, int $skip, int $take): ?array{
        $query = 'SELECT id, name, email FROM users WHERE MATCH(name,email) AGAINST (:search_term) ORDER BY id LIMIT :skip, :take;';

        $params['search_term'] = $searchTerm;
        $params['skip'] = $skip;
        $params['take'] = $take;

        return DB::fetchAll($query, $params);
    }
}