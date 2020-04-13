<?php

namespace App\Support\Contracts;

use Rakit\Validation\Validation;

interface SearchValidatorContract
{
    public static function validate(array $data): Validation;
}