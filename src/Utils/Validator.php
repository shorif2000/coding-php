<?php

namespace Utils;

use App\Middleware\MiddlewareException;

class Validator {

    public static function validateInputString(string $input, string $regex)
    {
        if( !empty($input) && !preg_match( $regex, $input)){
            throw new MiddlewareException("invalid text supplied");
        }
    }

    public static function validateInputNumber(string $input, string $regex)
    {
        if( !empty($input) && !preg_match( $regex, $input)){
            throw new MiddlewareException("invalid number supplied");
        }
    }
}