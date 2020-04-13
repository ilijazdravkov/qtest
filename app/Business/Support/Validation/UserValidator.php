<?php

namespace App\Business\Support\Validation;

use App\Business\Support\Contracts\UserValidatorContract;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class UserValidator implements UserValidatorContract
{
    public static function validateRegister(array $data): Validation{
        $validator = new Validator();

        $validation = $validator->make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
            'confirm_password' => 'required|same:password',
        ]);

        $validation->validate();

        return  $validation;
    }

    public static function validateLogin(array $data): Validation{
        $validator = new Validator();

        $validation = $validator->make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
        ]);

        $validation->validate();

        return  $validation;
    }
}