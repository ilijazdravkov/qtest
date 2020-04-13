<?php

namespace App\Business\Support\Contracts;

use Rakit\Validation\Validation;

interface UserValidatorContract
{
    public static function validateRegister(array $data): Validation;
}