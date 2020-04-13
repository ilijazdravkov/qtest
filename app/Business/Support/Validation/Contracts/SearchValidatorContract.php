<?php

namespace App\Business\Support\Contracts;

use Rakit\Validation\Validation;

interface SearchValidatorContract
{
    public static function validate(array $data): Validation;
}