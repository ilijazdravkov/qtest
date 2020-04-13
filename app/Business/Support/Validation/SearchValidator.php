<?php

namespace App\Business\Support\Validation;

use App\Business\Support\Contracts\SearchValidatorContract;
use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class SearchValidator implements SearchValidatorContract
{

    public static function validate(array $data): Validation
    {
        $validator = new Validator();

        $validation = $validator->make($data, [
            'search' => 'required',
            'page' => 'required|integer',
            'show' => 'required|integer',
        ]);

        $validation->validate();

        return  $validation;
    }
}