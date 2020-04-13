<?php

namespace App\Support\Validation;

use App\Support\Contracts\UserValidatorContract;
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

        if(!$validation->fails()){
            $uppercase = preg_match('@[A-Z]@', $data['password']);
            $lowercase = preg_match('@[a-z]@', $data['password']);
            $number = preg_match('@[0-9]@', $data['password']);
            $specialChars = preg_match('@[^\w]@', $data['password']);

            if(!$uppercase || !$lowercase || !$number || !$specialChars) {
                $strongPassErrorMsg = 'Password must have at least one upper case letter, one number, and one special character.';
                //$validation->setMessage('password', $strongPassErrorMsg);
                $validation->errors->add('password', '', $strongPassErrorMsg);
            }
        }

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