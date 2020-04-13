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

    public function login($email, $password): ?stdClass{
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
}